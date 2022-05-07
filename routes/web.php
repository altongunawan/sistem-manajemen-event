<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'login'])->name('login')->middleware('loggedIn');
Route::get('/register',[AuthController::class,'register'])->name('register')->middleware('loggedIn');

Route::post('/register', [AuthController::class,'registerUser'])->name('registerUser');
Route::post('/login', [AuthController::class,'loginUser'])->name('loginUser');

Route::get('/forgotPassword',[PasswordController::class,'showForgotPasswordForm'])->name('user.forgot.password.form');
Route::post('/forgotPassword',[PasswordController::class,'forgotPassword'])->name('user.forgot.password');
Route::get('/resetPassword/{token}',[PasswordController::class,'showResetPasswordForm'])->name('user.reset.password.form');
Route::post('/resetPassword',[PasswordController::class,'resetPassword'])->name('user.reset.password');

Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard')->middleware("authCheck");
