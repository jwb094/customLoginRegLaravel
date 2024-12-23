<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

//use App\Http\Controllers\Controller as LoginRegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/registeration', [AuthManager::class, 'registerPost'])->name('registeration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::get('/dashboard', [AuthManager::class, 'home'])->name('home');

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/registration', function () {
//     return view('registration');
// });
