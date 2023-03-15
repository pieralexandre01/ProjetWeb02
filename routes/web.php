<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SiteController;
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

Route::get('/reservations', [ReservationController::class, 'show'])
    ->name('reservations');

Route::get('/about', [SiteController::class, 'showAbout'])
    ->name('about');

Route::get('/articles', [ArticleController::class, 'show'])
    ->name('articles');

Route::get('/articles/{id}', [ArticleController::class, 'showById'])
    ->name('article');

Route::get('/contact', [SiteController::class, 'showContact'])
    ->name('contact');


// ------------------------------------------------------------------------------------ Auth

// Public
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::get('/account/create', [AuthController::class, 'createAccount'])
    ->name('account-create');

// todo : store (post)

// Admin
Route::get('/admin', [AuthController::class, 'showLoginAdmin'])
    ->name('admin-login');

Route::get('/admin/create', [AuthController::class, 'createAdmin'])
    ->name('admin-create');

// todo : store (post)

// Déconnexion


// ------------------------------------------------------------------------------------ Section dashboard public
// *********************************************** MIDDLEWARE ***********************************************


// ------------------------------------------------------------------------------------ Section admin
// *********************************************** MIDDLEWARE ***********************************************
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
