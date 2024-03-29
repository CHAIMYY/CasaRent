<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/login', [AuthController::class , 'login'])->name('login');
Route::post('/login', [AuthController::class , 'loginPost'])->name('login.post');
Route::get('/register',  [AuthController::class , 'register'])->name('register');
Route::post('/register',  [AuthController::class , 'registerPost'])->name('register.post');
Route::get('/logout', [AuthController::class , 'logout'])->name('logout');

Route::get('/', function () {
    return view('landing');
});
Route::get('/landing', function () {
    return view('landing');
})->name('landing');
Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/details', function () {
    return view('detail');
})->name('details');
Route::get('/create', function () {
    return view('landlord.create');
})->name('create');



