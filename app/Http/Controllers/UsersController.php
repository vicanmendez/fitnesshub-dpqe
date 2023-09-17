<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Gym;
use App\Models\City;
use App\Models\Province;
use App\Models\Country;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //

    public function loadUsers() {
        $users = User::all();

        foreach ($users as $user) {
            if($user->is_admin === 1) {
                $user->role = 'admin';
            } else {
                $trainer = Trainer::where('user_id', $user->id)->first();
                if($trainer) {
                    $user->role = 'trainer';
                } else {
                    $user->role = 'client';
                }
            }
        }
        return $users;
    }

    public function filterUsersByGym($currentUser) {
        $users = $this->loadUsers();
        $users = $users->filter(function ($user) use ($currentUser) {
            if($user->is_admin === 1) {
                return true;
            } else {
                $trainer = Trainer::where('user_id', $user->id)->first();
                if($trainer) {
                    return $trainer->gym_id === Trainer::where('user_id', $currentUser->id)->first()->gym_id;
                } else {
                    $client = Client::where('user_id', $user->id)->first();
                    if($client) {
                        return $client->gym_id === Trainer::where('user_id', $currentUser->id)->first()->gym_id;
                    }
                }
            }
        });
        return $users;
    }
    /*
    IMPORTANT: If the current user is an admin, then we can display the users for all gyms.
    However, if the current user is a trainer, we have to display the users for his/her gym only.
    */
    public function index()
    {
        $currentUser = Auth::user();
        $users = $this->loadUsers();
        $gyms = [];
        if ($currentUser->is_admin === 1) {
            $gyms = Gym::all();
        } else {
            //Remove the clients or trainers that dont belong to the current user's gym
            $users = $this->filterUsersByGym($currentUser);
            $gym_id = Trainer::where('user_id', $currentUser->id)->first()->gym_id;
            $gyms = Gym::where('id', $gym_id)->get();
        }
        $countries = Country::all();
        return view('users.index')->with([
            'users' => $users,
            'currentUser' => $currentUser,
            'gyms' => $gyms,   
            'countries' => $countries,
            ]
        );
    }

    public function delete($id) {
        $currentUser = Auth::user();
        //if the current user is not admin, we will redirect to the users index view, but with an error message
        if ($currentUser->is_admin === 1) {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('users')->withSuccess("El usuario se ha eliminado correctamente");
        } else {
            return redirect()->route('users')->withError("No tienes permisos para eliminar usuarios");
        }        
    }

    public function resetPassword($id) {
        $currentUser = Auth::user();
        //if the current user is not admin, we will redirect to the users index view, but with an error message
        if ($currentUser->is_admin === 1) {
            $user = User::find($id);
            $user->password = Hash::make($user->email);
            $user->save();
            return redirect()->route('users')->withSuccess("Se ha reseteado la contraseña del usuario correctamente, notificar al usuario de que su nueva clave es su email");
        } else {
            return redirect()->route('users')->withError("No tienes permisos para resetear contraseñas");
        }        
    }

    public function edit($id) {
        $currentUser = Auth::user();
        //Retrieve user data

        //
        $currentUser = Auth::user();
        if($currentUser->is_admin === 1) {
            $user = User::find($id);
            //Redirect to the edit view

            //
        } else {
            return redirect()->route('users')->withError("Solo los administradores pueden editar usuarios");
        }
    }

    public function new(Request $request)
    {
        $currentUser = Auth::user();
        $users = $this->loadUsers();
        $gyms = [];
        if ($currentUser->is_admin === 1) {
            $gyms = Gym::all();
        } else {
            $users = $this->filterUsersByGym($currentUser);
            $gym_id = Trainer::where('user_id', $currentUser->id)->first()->gym_id;
            $gyms = Gym::where('id', $gym_id)->get();
        }
        $countries = Country::all();
        // Validate input data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email', // Add unique validation rule
            // ... Other validation rules ...
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('emall'));
        $role = $request->input('role');
        if($role === 'admin' && $currentUser->is_admin === 1){
            $is_admin = 1;
            //By default, an admin user is also a trainer user, but not all trainers are admins
            $trainer = new Trainer();
        } else {
            $is_admin = 0;
            if($role === 'trainer') {
                //save the user in the trainers table
                $trainer = new Trainer();
                } elseif ($role === 'client') { //save the user in the fintess_clients table
                    $client = new Client();
                }
        }
        if($request->input('city') !== "null") {
            $city = $request->input('city');
        } else {
            $city = 1;
        }
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->is_admin = $is_admin;
        $user->city_id = $city;
        $user->save();
        if(isset($trainer)) {
            $trainer->presentation = "";
            $trainer->user_id = $user->id;
            $trainer->gym_id = $request->input('gym');
            $trainer->save();
        } 
        if (isset($client)) {
            $client->user_id = $user->id;
            $client->gym_id = $request->input('gym');
            $client->sex = $request->input("gender");
            $client->payment_status = "Pendiente";
            $client->save();
        }

        return view('users.index')->with([
            'currentUser' => $currentUser,
            'users' => $users,
            'success' => "Se ha creado el usuario exitosamente",
            'countries' => $countries,
            'gyms' => $gyms,
        ]);
    }
}
