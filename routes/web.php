<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('Admin.index');
});

Route::get('/home',[UserController::class,'home']);

Route::get('/contact',[UserController::class,'contact']);

Route::post('/sendMail',[UserController::class,'sendMail'])->name('sendMail');
// Route::get('/contact', function () {
//     return view('User.contact');
// })->name('contact');

