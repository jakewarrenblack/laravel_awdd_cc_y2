<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'login']);

// this is an alternative way of doing the above ^^
// in this case we don't have to import anything, it's done inline
// --------------------------------------------------------------- //
// Route::get('about', 'App\Http\Controllers\AboutController@about');

Route::get('/about', [LoginController::class, 'about']);
Route::get('/register', [LoginController::class, 'register']);
Route::get('/profile', [LoginController::class, 'profile']);



Route::get('/about', function () {
    return view('about');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/profile', function () {
    return view('profile');
});