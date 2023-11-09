<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('details', [AuthController::class, 'detail'])->middleware('auth:api');





Route::get('me', [AuthController::class, 'me'])->middleware('auth:api');
Route::get('logout', [AuthController::class, 'logout']);



Route::match(['GET', 'POST'], 'login', [AuthController::class, 'login'])->name('login');
Route::match(['GET', 'POST'], 'register', [AuthController::class, 'register'])->name('register');
