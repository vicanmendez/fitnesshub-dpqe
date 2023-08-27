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

    public function index()
    {
  
        $currentUser = Auth::user();
        $users = $this->loadUsers();
        $gyms = Gym::all();
        $countries = Country::all();
        return view('users.index')->with([
            'users' => $users,
            'currentUser' => $currentUser,
            'gyms' => $gyms,   
            'countries' => $countries,
            ]
        );
    }

    public function new(Request $request)
    {
        $users = $this->loadUsers();
        $gyms = Gym::all();
        $countries = Country::all();
        // Validate input data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email', // Add unique validation rule
            // ... Other validation rules ...
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $currentUser = Auth::user();
        $name = $request->input('name');
        $email = $request->input('email');
        $password = Hash::make($request->input('emall'));
        $role = $request->input('role');
        if($role === 'admin' && $currentUser->is_admin === 1){
            $is_admin = 1;
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
