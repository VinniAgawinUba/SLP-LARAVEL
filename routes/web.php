<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\School_YearsController;
use App\Http\Controllers\CollegesController;
use App\Http\Controllers\DepartmentsController;

Route::get('/', function () {return view('index');});


//Google Auth
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

//Login
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'Checklogin'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Partners
Route::get('/partners', [PartnersController::class, 'Frontpage_partners'])->name('frontpage_partners');

//Projects
Route::get('/projects', [ProjectsController::class, 'index'])->name('frontpage_projects');
Route::get('/projects/{school_year_id}', [ProjectsController::class, 'showsemester'])->name('projects.show_semester');
Route::get('/projects/{school_year_id}/{semester_id}', [ProjectsController::class, 'showcollege'])->name('projects.show_college');
Route::get('/projects/{school_year_id}/{semester_id}/{college_id}', [ProjectsController::class, 'showdepartment'])->name('projects.show_department');
Route::get('/projects/{school_year_id}/{semester_id}/{college_id}/{department_id}', [ProjectsController::class, 'showproject'])->name('projects.show_project');
Route::get('/projectview/{project_id}', [ProjectsController::class, 'showprojectview'])->name('projects.show_project_view');

//Articles
Route::get('/articles', [PageController::class, 'articles'])->name('articles');

//Gallery
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');

//Admin Panel