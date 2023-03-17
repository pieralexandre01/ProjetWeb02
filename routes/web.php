<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthenticateAdmin;
use App\Http\Middleware\RedirectUserIfAuthenticated;
use Illuminate\Support\Facades\Route;

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

// ------------------------------------------------------------------------------------ Section public

Route::get('/', [SiteController::class, 'index'])
    ->name('homepage');

Route::get('/activities', [ActivityController::class, 'show'])
    ->name('activities');

Route::get('/packages', [PackageController ::class, 'show'])
    ->name('packages');

Route::get('/about', [SiteController::class, 'showAbout'])
    ->name('about');

Route::get('/articles', [ArticleController::class, 'show'])
    ->name('articles');

Route::get('/articles/{id}', [ArticleController::class, 'showById'])
    ->name('article');

Route::get('/contact', [SiteController::class, 'showContact'])
    ->name('contact');


// ------------------------------------------------------------------------------------ Auth public

Route::middleware([RedirectUserIfAuthenticated::class])->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login');

    Route::get('/account/create', [AuthController::class, 'createAccount'])
        ->name('account-create');

    });

// Enregistrement d'un user
Route::post('/account/create',[AuthController::class, 'storeAccount'])
    ->name('account-create');

// ------------------------------------------------------------------------------------ Dashboard public
Route::get('/dashboard', [UserController::class, 'showDashboard'])
    ->name('dashboard')
    ->middleware('auth');

// ------------------------------------------------------------------------------------ Déconnexion

Route::post('/logout',[AuthController::class, 'logout'])
    ->name('logout');

// ------------------------------------------------------------------------------------ Section admin

Route::middleware([AuthenticateAdmin::class])->group(function () {

    Route::get('/admin/login', [AuthController::class, 'showLoginAdmin'])
        ->name('admin-login')
        // Ajout d'un middleware qui redirige au dashboard si déjà connecté
        ->middleware('redirect.admin')
        // Enlever le group middleware qui redirige si pas connecté
        ->withoutMiddleware(AuthenticateAdmin::class);

    Route::get('/admin', [AdminController::class, 'showDashboardAdmin'])
        ->name('admin-dashboard');

    // Activities

    // Articles

    // Users
    // créer - admin
    Route::get('/admin/create{id}', [AuthController::class, 'createAdmin'])
        ->name('admin-create');

    // modif - admin et public
    Route::get('/admin/edit', [AuthController::class, 'editAdmin'])
        ->name('admin-edit');

    Route::get('/user/edit', [AuthController::class, 'editUser'])
        ->name('user-edit');
    // supprimer - admin et public




    // route : /whatever/create
    // create - get
    // store - post

    // route : /whatever/edit/{id}
    // edit - get
    // update - post

    // destroy - get
    // Softdelete = block

});



