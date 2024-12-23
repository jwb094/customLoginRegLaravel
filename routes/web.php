<?php

use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\Controller as LoginRegisterController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/login', [LoginRegisterController::class, 'viewLogin']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/registration', function () {
    return view('registration');
});
