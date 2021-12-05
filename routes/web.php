<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you csan register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Direct our controllers to their corresponding views
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/user/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');

// Controllers for our two static 'welcome' and 'about' pages
Route::get('/', [PageController::class, 'welcome'])->name('welcome');
Route::get('/about', [PageController::class, 'about'])->name('about');
