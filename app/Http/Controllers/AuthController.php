<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule as ValidationRule;

class AuthController extends Controller
{

    /**
     * Affiche la page de connexion public
     *
     * @return void
     */
    public function showLogin() {
        return view('auth.public.login', [
            "title" => "Mirror World | Login"
        ]);
    }


    /**
     * Affiche la page de connexion admin
     *
     * @return void
     */
    public function showLoginAdmin() {
        return view('auth.admin.login', [
            "title" => "MW | Admin | Login"
        ]);
    }


    /**
     * Traite la connexion de l'utilisateur et valide le type d'utilisateur et redirige en fonction de celui-ci
     *
     * @param Request $request Contient les données de connexion
     */
    public function authenticate(Request $request) {

        $previous_url = $request->header('referer');

        // Valider les informations reçues
        $valid_infos = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => "The e-mail is required",
            'email.email' => "Please enter a valid e-mail",
            'password.required' => "The password is required"
        ]);

        // Tentative de connexion
        if(auth()->attempt($valid_infos)){

            // Création d'un objet avec les informations de l'utlisateur
            $user = User::where(['email' => $request->email])->first();

            // Vérifier si le user est bloqué
            if($user->deleted_at != null){
                return back()
                    ->with('login-blocked', "Access denied");
            }

            // Si le user arrive de la page de connexion admin
            $admin_url = URL::to('/') . '/admin/login';

            if($previous_url === $admin_url){

                // Vérifier si le user est admin et rediriger au dashboard admin
                if($user->privilege->type === 'admin') {
                    return redirect()
                        ->route('admin-dashboard');

                // Vérifier si le user est public et rediriger au formulaire de connexion avec msg d'erreur
                } elseif($user->privilege->type === 'public') {
                    auth()->logout();
                    return redirect()
                        ->route('admin-login')
                        ->with('login-blocked', "Access denied");
                }
            }

            // Connexion public réussi
            return redirect()
                ->route('homepage');
        }

        // En cas d'échec de la connexion
        return back()
                ->with('login-failed', 'The informations submitted could not be verified');
    }


    /**
     * Affiche la page de création de compte public
     *
     * @return void
     */
    public function createAccount() {
        return view('auth.public.account-creation', [
            "title" => "Mirror World | Account"
        ]);
    }


     /**
     * Affiche la page de création de compte admin
     *
     * @return void
     */
    public function createAdmin() {
        return view('auth.admin.account-creation', [
            "title" => "MW | Admin | Account"
        ]);
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
    public function logout() {
        auth()->logout();

        // return redirect()
        //     ->route('login')
        //     ->with('succes-deconnexion', "Déconnexion réussie");
    }


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
