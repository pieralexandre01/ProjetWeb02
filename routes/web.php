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
use App\Models\Package;
use App\Models\Reservation;
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


// ------------------------------------------------------------------------------------ Dashboard public et panier

Route::get('/dashboard', [UserController::class, 'showDashboard'])
    ->name('dashboard')
    ->middleware('auth');

// Ajout au panier
Route::post('/packages/addtocart/{id}', [PackageController::class, 'addToCart'])
    ->name('package-addtocart');

// Afficher le panier
Route::get('/cart', [UserController::class, 'showCart'])
    ->name('cart')
    ->middleware('auth');

// Supprimer un forfait du panier
Route::get('cart/package/delete/{index}', [UserController::class, 'deletePackageFromCart'])
    ->name('cart-package-delete')
    ->middleware('auth');

// Enregistrer le ou les forfait(s) acheté(s)
Route::get('/reservations/store', [ReservationController::class, 'store'])
    ->name('reservation-store')
    ->middleware('auth');


// ------------------------------------------------------------------------------------ Public et admin

// Déconnexion
Route::get('/logout',[AuthController::class, 'logout'])
    ->name('logout');

// Supprimer une réservation (public et admin)
Route::get('/reservations/delete/{id}', [ReservationController::class, 'destroy'])
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


    // Users -----------------------------------------------------------------

    // affichge formulaire création admin
    Route::get('/admin/create', [AuthController::class, 'createAdmin'])
        ->name('admin-create');

    // création d'un admin
    Route::post('/admin/store', [AuthController::class, 'storeAccount'])
        ->name('admin-store');

    // modif admin
    Route::get('/admin/edit/{id}', [AdminController::class, 'editAdmin'])
    ->name('admin-edit');

    // modif public
    Route::get('/admin/user/edit/{id}', [AdminController::class, 'editUser'])
    ->name('user-edit');

    // envoie du formulaire de modif d'un user
    Route::post('/admin/user/update/{id}', [AdminController::class, 'updateUser'])
        ->name('user-update');

    // envoie du formulaire de modif d'un mdp
    Route::get('/admin/password/edit/{id}', [AdminController::class, 'editPassword'])
        ->name('password-edit');

    // envoie du formulaire de modif d'un mdp
    Route::post('/admin/password/update/{id}', [AdminController::class, 'updatePassword'])
        ->name('password-update');

    // bloquer - admin et public
    Route::post('/admin/user/block/{id}', [AdminController::class, 'block'])
        ->name('user-block');

    // débloquer - admin et public
    Route::post('/admin/user/unblock/{id}', [AdminController::class, 'unblock'])
        ->name('user-unblock');


    // Articles -----------------------------------------------------------------

    // création
    Route::get('/admin/articles/create', [ArticleController::class, 'create'])
        ->name('article-create');

    Route::post('/admin/articles/store', [ArticleController::class, 'store'])
        ->name('article-store');

    // modif
    Route::get('/admin/articles/edit/{id}', [ArticleController::class, 'edit'])
        ->name('article-edit');

    Route::post('/admin/articles/edit/{id}', [ArticleController::class, 'update'])
        ->name('article-update');

    // supprimer
    Route::get('/admin/articles/delete/{id}', [AdminController::class, 'destroy'])
        ->name('article-delete');


    // Activities ------------------------------------------------------------

    // création
    Route::get('/admin/activities/create', [ActivityController::class, 'create'])
     ->name('activity-create');

    Route::post('/admin/activities/create', [ActivityController::class, 'store'])
        ->name('activity-store');

    // modif
    Route::get('/admin/activities/edit/{id}', [ActivityController::class, 'edit'])
        ->name('activity-edit');

    Route::post('/admin/activities/edit/{id}', [ActivityController::class, 'update'])
        ->name('activity-update');

    // supprimer
    Route::get('/admin/activities/delete/{id}', [ActivityController::class, 'destroy'])
        ->name('activity-delete');

});
