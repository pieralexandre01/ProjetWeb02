<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Affiche la page de connexion public
     *
     * @return void
     */
    public function showLogin() {
        return view('auth.public.login');
    }


    /**
     * Affiche la page de connexion admin
     *
     * @return void
     */
    public function showLoginAdmin() {
        return view('auth.admin.login');
    }


    // Connexion du user
    // Si le User provient de la page connexion public, rediriger vers le dashboard public
    // S'il y a un timestamp dans la colonne deleted_at, refuser l'accès
    //
    // Si le User provient de la page de connexion Admin, bloquer si c'est un public ou rediriger vers le dashboard Admin si c'est un admin
    // S'il y a un timestamp dans la colonne deleted_at, refuser l'accès


    /**
     * Affiche la page de création de compte public
     *
     * @return void
     */
    public function createAccount() {
        return view('auth.public.account-creation');
    }


     /**
     * Affiche la page de création de compte admin
     *
     * @return void
     */
    public function createAdmin() {
        return view('auth.admin.account-creation');
    }


    // Création de compte du User
    //
    // Si le User provient de la page création de compte Public, attribuer le type = public
    // S'il y a un timestamp dans la colonne deleted_at, aviser l'utilisateur qu'il est bloqué
    // Rediriger vers le Dashboard Public
    //
    // Si le User provient de la page de création de compte Admin, attribuer le type = Admin
    // S'il y a un timestamp dans la colonne deleted_at, aviser l'utilisateur qu'il est bloqué
    // Rediriger vers le dashboard Admin


    // Déconnexion de l'utilisateur


    // Fonctions utiles
    //
    // Pour valider s'il y a un timestamp dans la colonne deleted_at :
    // $request->validate([
    //     'deleted_at' => [
    //         'nullable',
    //         Rule::exists('table_name', 'deleted_at')->whereNotNull('deleted_at')
    //     ]
    // ]);
    //
    //
    // Pour vérifier d'où l'utilisateur vient :
    // public function login(Request $request)
    // {
    //     $previousUrl = $request->header('referer');
    //     // Utilisez $previousUrl pour rediriger l'utilisateur après la connexion.
    // }
}
