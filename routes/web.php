<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Mail\MyEmail;
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
    return view('Admin.index');
});

Route::get('/home',[UserController::class,'home'])->name('home');

Route::get('/contact',[UserController::class,'contact']);

Route::post('/sendMail',[UserController::class,'sendMail'])->name('sendMail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login',[LoginController::class,'login'])->name('login');

Route::post('/login',[LoginController::class,'authenticated']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[RegisterController::class,'register'])->name('register');

Route::post('/register',[RegisterController::class,'create']);


Route::get('/mailreset',[ResetPasswordController::class,'mailreset'])->name('mailreset');
Route::post('/mailreset',[ResetPasswordController::class,'postreset']);

Route::get('/reset',[ForgotPasswordController::class,'reset'])->name('reset');
Route::post('/reset',[ForgotPasswordController::class,'postreset']);

Route::resource('post', PostController::class);