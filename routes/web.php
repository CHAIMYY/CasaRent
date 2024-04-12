<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\UserController;
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
Route::get('/statistique', function () {
    return view('admin.statistique');
})->name('statistique');
Route::get('/landing', function () {
    return view('landing');
})->name('landing');
// Route::get('/home', function () {
//     return view('home');
// })->name('home');
Route::get('/details', function () {
    return view('detail');
})->name('details');
Route::get('/create', function () {
    return view('landlord.create');
})->name('create');

route::get('/Annonces');


//////////////////////////////////////backend////////////////////////////////

Route::get('/Categories', [CategoryController::class, 'view'])->name('categories');
Route::post('/Categories', [CategoryController::class, 'create'])->name('addCategorie');
Route::delete('/Categories/{category}', [CategoryController::class, 'delete'])->name('deleteCategorie');
//still not working
Route::put('/Categorie', [CategoryController::class, 'update'])->name('updateCategorie');


// Route::get('/search', [AnnonceController::class, 'search'])->name('search');

// Route::get('/annonces', [AnnonceController::class, 'show'])->name('show.annonce');

Route::get('/home', [AnnonceController::class, 'viewClient'])->name('home');
Route::post('/annonce/search', [AnnonceController::class, 'viewClient'])->name('events.search');
// Route::get('/annonceDetails/{id}', [AnnonceController::class, 'showDetails'])->name('details');
//admin part
Route::get('/Users', [UserController::class, 'viewUsers'])->name('users');
Route::get('/users/search', [UserController::class, 'searchUsers'])->name('users.search');
Route::get('/annonces', [AnnonceController::class, 'viewAll'])->name('admin.annonces');
Route::get('/annonces', [UserController::class, 'stats'])->name('stats');

