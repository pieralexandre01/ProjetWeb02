<?php

use App\Http\Controllers\ActivityController;
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

    // todo : store (post)

});

// ------------------------------------------------------------------------------------ Dashboard public
Route::get('/dashboard', [UserController::class, 'showDashboard'])
    ->name('dashboard')
    ->middleware('auth');

// ------------------------------------------------------------------------------------ Déconnexion

// todo : deconnexion


// ------------------------------------------------------------------------------------ Section admin

Route::middleware([AuthenticateAdmin::class])->group(function () {

    Route::get('/admin/login', [AuthController::class, 'showLoginAdmin'])
        ->name('admin-login')
        ->middleware('redirect.admin')
        ->withoutMiddleware(AuthenticateAdmin::class);

    Route::get('/admin/create', [AuthController::class, 'createAdmin'])
        ->name('admin-create');

    // todo : store (post)

    Route::get('/admin', [UserController::class, 'showDashboardAdmin'])
        ->name('admin-dashboard');

        // Activities
        // Articles
        // Users
        // Etc.

        // route : /whatever/create/{id}
        // create - get
        // store - post

        // route : /whatever/edit/{id}
        // edit - get
        // update - post

        // destroy - get
        // Softdelete = block

});



