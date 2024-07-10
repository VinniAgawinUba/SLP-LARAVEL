<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GoogleAuthController;

Route::get('/', function () {return view('index');});


//Google Auth
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

//Login
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'Checklogin'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Partners
Route::get('/partners', [PageController::class, 'partners'])->name('partners');

//Projects
Route::get('/projects', [PageController::class, 'projects'])->name('projects');

//Articles
Route::get('/articles', [PageController::class, 'articles'])->name('articles');

//Gallery
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

//Admin Panel