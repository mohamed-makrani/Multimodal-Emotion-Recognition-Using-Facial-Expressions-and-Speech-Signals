<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllerRegister;
use App\Http\Controllers\AuthControllerLogin;
use App\Http\Controllers\EmotionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\RegisterAdminAuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardAdminAuthController;
use App\Http\Controllers\AgentPageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\loader;


Route::get('/home', [EmotionController::class, 'home'])->name('home');


Route::get('/guest', function () {
    return view('guest');
});


Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthControllerLogin::class, 'login'])->name('login');


Route::get('/register', function () {
    return view('register');
});
Route::post('/register', [AuthControllerRegister::class, 'register'])->name('register');


Route::post('/logout', [AuthControllerLogin::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class,'profile'])->name('profile');

Route::get('/update', [UpdateProfileController::class,'showUpdateForm'])->name('updateProfile-form');
Route::post('/update', [UpdateProfileController::class,'updateProfile'])->name('updateProfile');


Route::get('/propos', function () {
    return view('apropos');
});



// Partie Admin


// Page d'inscription
Route::get('/admin/register', [RegisterAdminAuthController::class, 'showRegister']);
// Traitement du formulaire
Route::post('/admin/register', [RegisterAdminAuthController::class, 'register'])->name('admin.register');


Route::get('/admin/login', function () {
    return view('admin/login');
});
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [DashboardAdminAuthController::class, 'dashboard'])->name('admin.dashboard');


Route::get('/admin/agent', [AgentPageController::class, 'showAgents'])->name('admin.agent');


Route::get('/load', [loader::class, 'loading'])->name('load.page');


use App\Http\Controllers\EmotionDetectionController;

Route::post('/result', [EmotionDetectionController::class, 'launchFusion']);
Route::get('/result', function () {
    return view('result'); // ou une autre vue
});



Route::post('/clients/addClient', [ClientController::class, 'addClient'])->name('clients.addClient');
Route::get('/mesgResult', function () {
    return view('messageResult'); // ou une autre vue
});
