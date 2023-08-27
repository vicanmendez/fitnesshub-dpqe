<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;	
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DropdownController as DropdownController;

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
    Route::get('/usuarios', 'App\Http\Controllers\UsersController@index')->name('users');
    Route::post('/usuarios/nuevo', 'App\Http\Controllers\UsersController@new')->name('users.new');
    Route::get('/gimnasios', 'App\Http\Controllers\GymController@index')->name('gyms');
    Route::post('/gimnasios/nuevo', 'App\Http\Controllers\GymController@new')->name('gyms.new');
    Route::get('/clientes', 'App\Http\Controllers\ClientsController@index')->name('clients');
    Route::get('/clientes/{id}', 'App\Http\Controllers\ClientsController@edit')->name('clients.edit');
    Route::put('/clientes/{id}', 'App\Http\Controllers\ClientsController@update')->name('clients.update');


    Route::get('/get-provinces/{countryId}', [DropdownController::class, 'getProvinces'])->name('getProvinces');
    Route::get('/get-cities/{provinceId}', [DropdownController::class, 'getCities'])->name('getCities');




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
