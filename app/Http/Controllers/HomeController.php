<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class HomeController extends Controller
{
    //
    function index()
    {
        //Get an array with the last 7 days with the format 'dd-mm-yy'
        $last7Days = array();
        $amountClients = array();
        for ($i = 0; $i < 7; $i++) {
            $last7Days[] = date('Y-m-d', strtotime('-' . $i . ' days'));
        }

        foreach ($last7Days as $day) {
            $amountClients[] = Client::whereDate('created_at', $day)->count();
        }

        //chane the format of every day to 'dd-mm'
        foreach ($last7Days as $key => $day) {
            $last7Days[$key] = date('d-m', strtotime($day));
        }

        //Change the order, both current and amount of clients
        $last7Days = array_reverse($last7Days);
        $amountClients = array_reverse($amountClients);
        $currentUser = Auth::user();

        return view('home.index')->with([
            'currentUser' => $currentUser,
            'last7Days' => $last7Days,
            'amountClients' => $amountClients,
        ]);
    }
}
