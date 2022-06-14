<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProfileController;

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
    return redirect('home');	
});

Route::get('/home', function () {
    return view('main_dashboard');
});

Route::get('/profile', [ProfileController::class, 'getView']);

Route::get('auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('callbacks/google', [GoogleAuthController::class, 'handleCallback']);
Route::get('logout', [GoogleAuthController::class, 'logOut']);