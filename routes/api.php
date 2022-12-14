<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Middleware
Route::group(['prefix' => 'v1', 'middleware' => 'jwt.verify'], function () {
    //Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

//Register
Route::post('/register', [UserController::class, 'register'])->name('register');

//Login
Route::post('/login', [UserController::class, 'login'])->name('login');
