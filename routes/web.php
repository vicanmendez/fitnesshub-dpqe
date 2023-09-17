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
    Route::get('/usuarios/{id}', 'App\Http\Controllers\UsersController@edit')->name('users.edit');
    Route::put('/usuarios/{id}/password', 'App\Http\Controllers\UsersController@resetPassword')->name('users.resetPassword');
    Route::get('/usuarios/{id}/eliminar', 'App\Http\Controllers\UsersController@delete')->name('users.delete');

    Route::get('/gimnasios', 'App\Http\Controllers\GymController@index')->name('gyms');
    Route::post('/gimnasios/nuevo', 'App\Http\Controllers\GymController@new')->name('gyms.new');
    
    Route::get('/clientes', 'App\Http\Controllers\ClientsController@index')->name('clients');
    Route::get('/clientes/{id}', 'App\Http\Controllers\ClientsController@edit')->name('clients.edit');
    Route::put('/clientes/{id}', 'App\Http\Controllers\ClientsController@update')->name('clients.update');

    Route::get('/ejercicios', 'App\Http\Controllers\ExerciseController@index')->name('exercises');
    Route::post('/ejercicios/nuevo', 'App\Http\Controllers\ExerciseController@new')->name('exercises.new');
    Route::get('/ejercicios/{id}', 'App\Http\Controllers\ExerciseController@edit')->name('exercises.edit');
    Route::put('/ejercicios/{id}', 'App\Http\Controllers\ExerciseController@update')->name('exercises.update');
    Route::get('/ejercicios/{id}/eliminar', 'App\Http\Controllers\ExerciseController@delete')->name('exercises.delete');

    Route::get('/programas', 'App\Http\Controllers\ProgramController@index')->name('programs');
    Route::post('/programas/nuevo', 'App\Http\Controllers\ProgramController@new')->name('programs.new');
    Route::get('/programas/{id}', 'App\Http\Controllers\ProgramController@edit')->name('programs.edit');
    Route::put('/programas/{id}', 'App\Http\Controllers\ProgramController@update')->name('programs.update');
    Route::get('/programas/{id}/eliminar', 'App\Http\Controllers\ProgramController@delete')->name('programs.delete');    
    Route::get('/programas/{id}/rutinas', 'App\Http\Controllers\ProgramController@routines')->name('programs.routines');
    Route::post('/programas/{id}/rutinas/nuevo', 'App\Http\Controllers\ProgramController@newRoutine')->name('programs.routines.new');
    Route::get('/programas/{id}/rutinas/{id_rut}/eliminar', 'App\Http\Controllers\ProgramController@deleteRoutine')->name('programs.routines.delete');

    Route::post('/rutinas/nuevo', 'App\Http\Controllers\RoutineController@new')->name('routines.new');
    Route::get('/rutinas/{id}', 'App\Http\Controllers\RoutineController@edit')->name('routines.edit');
    Route::put('/rutinas/{id}', 'App\Http\Controllers\RoutineController@update')->name('routines.update');
    Route::get('/rutinas/{id}/eliminar', 'App\Http\Controllers\RoutineController@delete')->name('routines.delete');
    Route::get('/rutinas/{id}/ejercicios', 'App\Http\Controllers\RoutineController@exercises')->name('routines.exercises');
    Route::get('/rutinas/{id}/ejercicios/{id_ejer}', 'App\Http\Controllers\RoutineController@loadExercise')->name('routines.exercises.load');
    Route::post('/rutinas/{id}/ejercicios/nuevo/{id_ejer}', 'App\Http\Controllers\RoutineController@newExercise')->name('routines.exercises.new');
    Route::get('/rutinas/{id}/ejercicios/{id_ejer}/eliminar', 'App\Http\Controllers\RoutineController@deleteExercise')->name('routines.exercises.delete');

    Route::get('/planificaciones', 'App\Http\Controllers\AssignmentController@index')->name('assignments');
    Route::post('/planificaciones/nuevo', 'App\Http\Controllers\AssignmentController@new')->name('assignments.new');
    Route::get('/planificaciones/{id}/eliminar', 'App\Http\Controllers\AssignmentController@delete')->name('assignments.delete');

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
