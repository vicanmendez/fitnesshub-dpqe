<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    function index()
    {
        $currentUser = Auth::user();

        return view('home.index')->with([
            'currentUser' => $currentUser
        ]);
    }
}
