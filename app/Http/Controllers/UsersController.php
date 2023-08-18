<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trainer;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //

    public function index()
    {
  
        $currentUser = Auth::user();

        return view('users.index')->with([
            'currentUser' => $currentUser        ]
        );
    }

    public function new(Request $request)
    {
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
        if($trainer) {
            $trainer->presentation = "";
            $trainer->user_id = $user->id;
            $trainer->save();
        } 
        

        return view('users.index')->with([
            'currentUser' => $currentUser,
        ]);
    }
}
