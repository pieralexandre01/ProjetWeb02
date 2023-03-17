<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReservationController;
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
// ******************************************************************************************************************************************** todo!
Route::post('/account/create',[AuthController::class, 'storeAccount'])
    ->name('account-create');

// ------------------------------------------------------------------------------------ Dashboard public
Route::get('/dashboard', [UserController::class, 'showDashboard'])
    ->name('dashboard')
    ->middleware('auth');

// ------------------------------------------------------------------------------------ Public et admin
// Déconnexion
Route::get('/logout',[AuthController::class, 'logout'])
    ->name('logout');

// Supprimer une réservation (public et admin)
Route::post('/reservations/delete{id}', [ReservationController::class, 'destroy'])
    ->name('reservation-delete')
    ->middleware('auth');

// ------------------------------------------------------------------------------------ Section admin

Route::middleware([AuthenticateAdmin::class])->group(function () {

    // Connexion ------------------------------------------------------------
    Route::get('/admin/login', [AuthController::class, 'showLoginAdmin'])
        ->name('admin-login')
        // Ajout d'un middleware qui redirige au dashboard si déjà connecté
        ->middleware('redirect.admin')
        // Enlever le group middleware qui redirige si pas connecté
        ->withoutMiddleware(AuthenticateAdmin::class);

    Route::get('/admin', [AdminController::class, 'showDashboardAdmin'])
        ->name('admin-dashboard');


    // ******************************************************************************************************************************************** todo!

    // Users -----------------------------------------------------------------
    // affichge formulaire création admin
    Route::get('/admin/create', [AuthController::class, 'createAdmin'])
        ->name('admin-create');

    // modif
    // affichage formulaire modif user admin
    Route::get('/admin/edit{id}', [AdminController::class, 'editAdmin'])
    ->name('admin-edit');

    // affichage formulaire modif user public
    Route::get('/user/edit{id}', [AdminController::class, 'editUser'])
    ->name('user-edit');

    // envoie du formulaire de modif d'un user
    Route::post('/user/update{id}', [AdminController::class, 'updateUser'])
        ->name('user-update');

    // bloquer - admin et public
    Route::post('/user/block{id}', [AdminController::class, 'block'])
        ->name('user-block');

    // débloquer - admin et public
    Route::post('/user/unblock{id}', [AdminController::class, 'unblock'])
        ->name('user-unblock');

    // Articles --------------------------------------------------------------
    // création
    Route::get('/articles/create', [ArticleController::class, 'create'])
        ->name('article-create');

    Route::post('/articles/create', [ArticleController::class, 'store'])
        ->name('article-store');

    // modif
    Route::get('/articles/edit{id}', [ArticleController::class, 'edit'])
        ->name('article-edit');

    Route::post('/articles/edit{id}', [ArticleController::class, 'update'])
        ->name('article-update');

    // supprimer
    Route::post('/articles/delete{id}', [AdminController::class, 'destroy'])
        ->name('article-delete');


    // Activities ------------------------------------------------------------
    // création
    Route::get('/activities/create', [ActivityController::class, 'create'])
     ->name('activity-create');

    Route::post('/activities/create', [ActivityController::class, 'store'])
        ->name('activity-store');

    // modif
    Route::get('/activities/edit{id}', [ActivityController::class, 'edit'])
        ->name('activity-edit');

    Route::post('/activities/edit{id}', [ActivityController::class, 'update'])
        ->name('activity-update');

    // supprimer
    Route::post('/activities/delete{id}', [ActivityController::class, 'destroy'])
        ->name('activity-delete');

});
