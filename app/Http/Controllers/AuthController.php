<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\UniqueEmailNotSoftDeleted;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            "title" => "Mirror World | Login",
            "page" => "login",
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

            // vérifier la session - redirection au cart
            if( ! session()->isEmpty) {
                // boucle?
                // $package_url = ;
            }

            // Si le user arrive de la page de connexion admin
            $admin_url = URL::to('/') . '/admin/login';

            if($previous_url == $admin_url){

                // Vérifier si le user est admin et rediriger au dashboard admin
                if($user->privilege->type == 'admin') {
                    return redirect()
                        ->route('admin-dashboard');

                // Vérifier si le user est public et rediriger au formulaire de connexion avec msg d'erreur
                } elseif($user->privilege->type == 'public') {
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
            "title" => "Mirror World | Account",
            "page" => "account-create",
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

    /**
     * Traite les données d'une création de compte
     *
     * @param Request $request Données reçues
     */
    public function storeAccount(Request $request) {
        // Valider
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', new UniqueEmailNotSoftDeleted],
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ], [
            'first_name.required' => 'Your first name is required',
            'last_name.required' => 'Your last name is required',
            'email.required' => 'Your e-mail is required',
            'email.email' => 'Your e-mail must be valid',
            'password.required' => 'The password is required',
            'password_confirm.required' => 'The password confirmation is required',
            'password_confirm.same' => 'The password confirmation does not match the password entered'
        ]);

        // Création d'un nouvel utilisateur
        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        // Encryption du mot de passe
        $user->password = Hash::make($request->password);

        // Gère le type de user qui est en train de se créer un compte
        if($request->privilege_type == 'admin') {
            $user->privilege_id = 1;

            $user->save();

            return redirect()
                ->route('admin-dashboard')
                ->with('account-created', 'The account has been created succesfully');

        } elseif ($request->privilege_type == 'public') {
            $user->privilege_id = 2;

            $user->save();
            auth()->login($user);

            return redirect()
                ->route('homepage');
        }
    }

    // Déconnexion de l'utilisateur
    public function logout() {
        auth()->logout();

        return redirect()
            ->route('homepage');
    }
}
