<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gym;
use App\Models\City;
use App\Models\Province;    
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GymController extends Controller
{

    public function index()
    {
        $currentUser = Auth::user();

        $gyms = Gym::all();
        $countries = Country::all();
        return view('gyms.index')->with([
            'currentUser' => $currentUser,
            'gyms' => $gyms,
            'countries' => $countries
        ]);
    }

    public function new(Request $request)
    {
        $currentUser = Auth::user();


        $name = $request->input('name');
        $address = $request->input('address');
        $cityId = $request->input('city_id');
        $phone = $request->input('phone');
        $lat = $request->input('lat');
        $long = $request->input('long');

        $gym = new Gym();
        $gym->name = $name;
        $gym->address = $address;
        $gym->city_id = $cityId;
        $gym->phone = $phone;
        $gym->lat = $lat;
        $gym->long = $long;
        $gym->save();

        return redirect()->route('gyms')->with([
            'currentUser' => $currentUser,
            'success' => 'El gimnasio se ha creado exitosamente.'
        ]);
    }

    // Other methods (edit, update, delete) can be added here

    // ...
}
