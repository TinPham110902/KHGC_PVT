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

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('home');
    });
    
    
    Route::get('/home',[UserController::class,'home'])->name('home');
    
    Route::get('/contact',[UserController::class,'contact']);
    
    Route::post('/sendMail',[UserController::class,'sendMail'])->name('sendMail');
    
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
    
    Route::get('/profile/edit',[UserController::class,'profile_edit'])->name('profile_edit');
    Route::post('/profile/edit',[UserController::class,'profile_edit_post']);
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    
    Route::resource('post', PostController::class);

    Route::delete('post/post/{id}', [PostController::class,'destroyAll'])->name('post.destroyAll');

});

Route::get('/login',[LoginController::class,'login'])->name('login');
    
Route::post('/login',[LoginController::class,'authenticated']);

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/register',[RegisterController::class,'register'])->name('register');

Route::post('/register',[RegisterController::class,'create']);


Route::get('/mailreset',[ResetPasswordController::class,'mailreset'])->name('mailreset');
Route::post('/mailreset',[ResetPasswordController::class,'postreset']);

Route::get('/get-password/{users}/{token}',[ResetPasswordController::class,'getPass'])->name('customer.getPass');
Route::post('/get-password/{users}/{token}',[ResetPasswordController::class,'postGetpass']);

// Route::get('/reset',[ResetPasswordController::class,'reset'])->name('reset');
// Route::post('/reset',[ResetPasswordController::class,'postreset']);