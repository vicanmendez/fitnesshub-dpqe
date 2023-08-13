<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;	
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::middleware('auth')->group(function () {
    // Your routes that require authentication
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
    // ...
});



//Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');



//Authentication Routes
Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('/register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@create');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
