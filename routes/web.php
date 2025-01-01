<?php

use Illuminate\Support\Facades\Route;
use App\Models\Session;
use App\Http\Controllers\Auth\UserController;

Route::get('/', function () {
    return view('welcome');
})->middleware("auth");
Route::get('/session', [UserController::class, 'ses']);
Route::post('/login', [UserController::class, 'login']);

Route::get('login', function (){ return View('login') ;})->name("login");
