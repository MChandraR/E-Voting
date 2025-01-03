<?php

use Illuminate\Support\Facades\Route;
use App\Models\Session;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\AdminController;

Route::get('/', function () {
    return view('welcome');
})->middleware("auth");

Route::get('/session', [UserController::class, 'ses']);
Route::get('/voting', function(){return View('voting');})->middleware("auth");
Route::post('/login', [UserController::class, 'login']);

Route::get('login', function (){ return View('login') ;})->name("login");


//Route untuk admin
Route::get('/admin', [AdminController::class, 'index'])->middleware("auth");