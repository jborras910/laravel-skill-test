<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthManager;



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
// user auth
Route::get('/', [AuthManager::class, 'index'])->name('home');
Route::get('/login', [AuthManager::class, 'login'])->name('login');





Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration',[AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');




// logout function
Route::get('/logout', [AuthManager::class,'logout'])->name('logout');


// user crud

Route::get('/user/{user}/edit', [Controller::class, 'edit'])->name('user.edit');
Route::put('/user/{user}/update', [Controller::class, 'update'])->name('user.update');
Route::get('/user/create', [Controller::class, 'create'])->name('user.create');
Route::post('/user/store', [Controller::class, 'store'])->name('user.store');
Route::delete('/user/{user}/destroy', [Controller::class, 'destroy'])->name('user.destroy');


Route::get('/homepage', [Controller::class, 'homePage'])->name('homePage');
