<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\School_YearsController;
use App\Http\Controllers\CollegesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\PartnersController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\GalleriesController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\FacultiesController;

Route::get('/', function () {return view('index');})->name('index');


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
Route::get('/articles', [ArticlesController::class, 'articles'])->name('articles');
Route::get('/articles/{article_id}', [ArticlesController::class, 'article'])->name('article');

//Gallery
Route::get('/gallery', [GalleriesController::class, 'gallery'])->name('gallery');

//Admin Panel
Route::get('/admin', [PageController::class, 'admin'])->name('admin');

//Admin Panel Registered Users
Route::get('/admin/register/view', [PageController::class, 'RegisterView'])->name('admin.registerView');
Route::get('/admin/register/add', [RegisteredUserController::class, 'RegisterAdd'])->name('admin.registerAdd');
Route::post('/admin/register/add', [RegisteredUserController::class, 'registerInsert'])->name('admin.registerInsert');
Route::get('/admin/register/edit/{id}', [RegisteredUserController::class, 'RegisterEdit'])->name('admin.registerEdit');
Route::put('/admin/register/update/{id}', [RegisteredUserController::class, 'registerUpdate'])->name('admin.registerUpdate');
Route::post('/admin/register/delete', [RegisteredUserController::class, 'registerDelete'])->name('admin.registerDelete');

//Admin Faculty
Route::get('/admin/faculty/view', [FacultiesController::class, 'FacultyView'])->name('admin.facultyView');
Route::get('/admin/faculty/add', [FacultiesController::class, 'FacultyAdd'])->name('admin.facultyAdd');
Route::post('/admin/faculty/add', [FacultiesController::class, 'FacultyInsert'])->name('admin.facultyInsert');
Route::get('/admin/faculty/edit/{id}', [FacultiesController::class, 'FacultyEdit'])->name('admin.facultyEdit');
Route::post('/admin/faculty/update/{id}', [FacultiesController::class, 'FacultyUpdate'])->name('admin.facultyUpdate');
Route::post('/admin/faculty/delete/{id}', [FacultiesController::class, 'FacultyDelete'])->name('admin.facultyDelete');
