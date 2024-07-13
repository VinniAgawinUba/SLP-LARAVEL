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

// Search Route
Route::get('/search', [SearchController::class, 'search'])->name('search');


//Google Auth
Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google.auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

//Login
Route::get('/login', [PageController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'Checklogin'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//Partners
Route::get('/partners', [PartnersController::class, 'Frontpage_partners'])->name('frontpage_partners');
Route::get('/partners/{partner_id}', [PartnersController::class, 'Partner_details'])->name('partner-details');

//Frontpage Projects
Route::get('/projects', [ProjectsController::class, 'index'])->name('frontpage_projects');
Route::get('/projects/{school_year_id}', [ProjectsController::class, 'showsemester'])->name('projects.show_semester');
Route::get('/projects/{school_year_id}/{semester_id}', [ProjectsController::class, 'showcollege'])->name('projects.show_college');
Route::get('/projects/{school_year_id}/{semester_id}/{college_id}', [ProjectsController::class, 'showdepartment'])->name('projects.show_department');
Route::get('/projects/{school_year_id}/{semester_id}/{college_id}/{department_id}', [ProjectsController::class, 'showproject'])->name('projects.show_project');
Route::get('/projectview/{project_id}', [ProjectsController::class, 'showprojectDetails'])->name('projects.show_project_view');

//Articles
Route::get('/articles', [ArticlesController::class, 'articles'])->name('articles.View');
Route::get('/articles/{article_id}', [ArticlesController::class, 'article'])->name('articles.Details');

//Gallery
Route::get('/gallery', [GalleriesController::class, 'gallery'])->name('gallery');
Route::get('/gallery/{gallery_id}', [GalleriesController::class, 'galleryDetails'])->name('gallery.details');




//Admin Panel
Route::get('/admin', [PageController::class, 'admin'])->name('admin');

//Admin Panel Registered Users
Route::get('/admin/register/view', [PageController::class, 'RegisterView'])->name('admin.registerView');
Route::get('/admin/register/add', [RegisteredUserController::class, 'RegisterAdd'])->name('admin.registerAdd');
Route::post('/admin/register/add', [RegisteredUserController::class, 'registerInsert'])->name('admin.registerInsert');
Route::get('/admin/register/edit/{id}', [RegisteredUserController::class, 'RegisterEdit'])->name('admin.registerEdit');
Route::put('/admin/register/update/{id}', [RegisteredUserController::class, 'registerUpdate'])->name('admin.registerUpdate');
Route::post('/admin/register/delete', [RegisteredUserController::class, 'registerDelete'])->name('admin.registerDelete');

//Admin Projects
Route::get('/admin/projects/view', [ProjectsController::class, 'ProjectsView'])->name('admin.projectsView');
Route::get('/admin/projects/add', [ProjectsController::class, 'ProjectsAdd'])->name('admin.projectsAdd');
Route::post('/admin/projects/add', [ProjectsController::class, 'ProjectsInsert'])->name('admin.projectsInsert');
Route::get('/admin/projects/edit/{id}', [ProjectsController::class, 'ProjectsEdit'])->name('admin.projectsEdit');
Route::post('/admin/projects/update/{id}', [ProjectsController::class, 'ProjectsUpdate'])->name('admin.projectsUpdate');
Route::post('/admin/projects/delete/{id}', [ProjectsController::class, 'ProjectsDelete'])->name('admin.projectsDelete');
Route::delete('/admin/projects/document-delete/{id}', [ProjectsController::class, 'IndividualProjectDocumentDelete'])->name('admin.projects.documentDelete');
Route::post('/admin/projects/update-featured', [ProjectsController::class, 'updateFeatured'])->name('admin.projectsUpdateFeatured'); //Ajax Update Featured

//Admin Faculty
Route::get('/admin/faculty/view', [FacultiesController::class, 'FacultyView'])->name('admin.facultyView');
Route::get('/admin/faculty/add', [FacultiesController::class, 'FacultyAdd'])->name('admin.facultyAdd');
Route::post('/admin/faculty/add', [FacultiesController::class, 'FacultyInsert'])->name('admin.facultyInsert');
Route::get('/admin/faculty/edit/{id}', [FacultiesController::class, 'FacultyEdit'])->name('admin.facultyEdit');
Route::post('/admin/faculty/update/{id}', [FacultiesController::class, 'FacultyUpdate'])->name('admin.facultyUpdate');
Route::post('/admin/faculty/delete/{id}', [FacultiesController::class, 'FacultyDelete'])->name('admin.facultyDelete');

//Admin Partners
Route::get('/admin/partners/view', [PartnersController::class, 'PartnersView'])->name('admin.partnersView');
Route::get('/admin/partners/add', [PartnersController::class, 'PartnersAdd'])->name('admin.partnersAdd');
Route::post('/admin/partners/add', [PartnersController::class, 'PartnersInsert'])->name('admin.partnersInsert');
Route::get('/admin/partners/edit/{id}', [PartnersController::class, 'PartnersEdit'])->name('admin.partnersEdit');
Route::post('/admin/partners/update/{id}', [PartnersController::class, 'PartnersUpdate'])->name('admin.partnersUpdate');
Route::post('/admin/partners/delete/{id}', [PartnersController::class, 'PartnersDelete'])->name('admin.partnersDelete');
Route::post('/admin/partners/update-featured', [PartnersController::class, 'updateFeatured'])->name('admin.partnersUpdateFeatured'); //Ajax Update Featured

//Admin Articles
Route::get('/admin/articles/view', [ArticlesController::class, 'ArticlesView'])->name('admin.articlesView');
Route::get('/admin/articles/add', [ArticlesController::class, 'ArticlesAdd'])->name('admin.articlesAdd');
Route::post('/admin/articles/add', [ArticlesController::class, 'ArticlesInsert'])->name('admin.articlesInsert');
Route::get('/admin/articles/edit/{id}', [ArticlesController::class, 'ArticlesEdit'])->name('admin.articlesEdit');
Route::post('/admin/articles/update/{id}', [ArticlesController::class, 'ArticlesUpdate'])->name('admin.articlesUpdate');
Route::post('/admin/articles/delete/{id}', [ArticlesController::class, 'ArticlesDelete'])->name('admin.articlesDelete');
Route::post('/admin/articles/update-featured', [ArticlesController::class, 'updateFeatured'])->name('admin.articlesUpdateFeatured'); //Ajax Update Featured

//Admin Gallery
Route::get('/admin/gallery/view', [GalleriesController::class, 'GalleryView'])->name('admin.galleryView');
Route::get('/admin/gallery/add', [GalleriesController::class, 'GalleryAdd'])->name('admin.galleryAdd');
Route::post('/admin/gallery/add', [GalleriesController::class, 'GalleryInsert'])->name('admin.galleryInsert');
Route::get('/admin/gallery/edit/{id}', [GalleriesController::class, 'GalleryEdit'])->name('admin.galleryEdit');
Route::post('/admin/gallery/update/{id}', [GalleriesController::class, 'GalleryUpdate'])->name('admin.galleryUpdate');
Route::post('/admin/gallery/delete/{id}', [GalleriesController::class, 'GalleryDelete'])->name('admin.galleryDelete');
Route::delete('/admin/photo-delete/{id}', [GalleriesController::class, 'PhotoDelete'])->name('admin.photoDelete');

//Admin Colleges
Route::get('/admin/colleges/view', [CollegesController::class, 'CollegesView'])->name('admin.collegesView');
Route::get('/admin/colleges/add', [CollegesController::class, 'CollegesAdd'])->name('admin.collegesAdd');
Route::post('/admin/colleges/add', [CollegesController::class, 'CollegesInsert'])->name('admin.collegesInsert');
Route::get('/admin/colleges/edit/{id}', [CollegesController::class, 'CollegesEdit'])->name('admin.collegesEdit');
Route::post('/admin/colleges/update/{id}', [CollegesController::class, 'CollegesUpdate'])->name('admin.collegesUpdate');
Route::post('/admin/colleges/delete/{id}', [CollegesController::class, 'CollegesDelete'])->name('admin.collegesDelete');

//Admin Departments
Route::get('/admin/departments/view', [DepartmentsController::class, 'DepartmentsView'])->name('admin.departmentsView');
Route::get('/admin/departments/add', [DepartmentsController::class, 'DepartmentsAdd'])->name('admin.departmentsAdd');
Route::post('/admin/departments/add', [DepartmentsController::class, 'DepartmentsInsert'])->name('admin.departmentsInsert');
Route::get('/admin/departments/edit/{id}', [DepartmentsController::class, 'DepartmentsEdit'])->name('admin.departmentsEdit');
Route::post('/admin/departments/update/{id}', [DepartmentsController::class, 'DepartmentsUpdate'])->name('admin.departmentsUpdate');
Route::post('/admin/departments/delete/{id}', [DepartmentsController::class, 'DepartmentsDelete'])->name('admin.departmentsDelete');

//Admin School Years
Route::get('/admin/school-years/view', [School_YearsController::class, 'SchoolYearsView'])->name('admin.schoolYearsView');
Route::get('/admin/school-years/add', [School_YearsController::class, 'SchoolYearsAdd'])->name('admin.schoolYearsAdd');
Route::post('/admin/school-years/add', [School_YearsController::class, 'SchoolYearsInsert'])->name('admin.schoolYearsInsert');
Route::get('/admin/school-years/edit/{id}', [School_YearsController::class, 'SchoolYearsEdit'])->name('admin.schoolYearsEdit');
Route::post('/admin/school-years/update/{id}', [School_YearsController::class, 'SchoolYearsUpdate'])->name('admin.schoolYearsUpdate');
Route::post('/admin/school-years/delete/{id}', [School_YearsController::class, 'SchoolYearsDelete'])->name('admin.schoolYearsDelete');