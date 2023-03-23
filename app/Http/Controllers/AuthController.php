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
            "title" => "MW | Admin | Login",
            "page" => "login",
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
            'email.email' => "The e-mail must be valid",
            'password.required' => "The password is required"
        ]);

        // Tentative de connexion
        if(auth()->attempt($valid_infos)){

            // Création d'un objet avec les informations de l'utlisateur
            $user = User::where(['email' => $request->email])->first();

            // vérifier la session - redirection au cart
            if(session()->get('packages') !== null) {
                return redirect()
                    ->route('cart');
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

        // ECHEC
        // Vérifier si le user qui tente de se connecter est bloqué
        $failed_user = User::withTrashed()->where(['email' => $request->email])->first();

        if ($failed_user != null && $failed_user->deleted_at != null) {
            return back()
                ->with('login-blocked', "Access denied");
        }

        // En cas d'échec de la connexion
        return back()
                ->with('login-failed', 'The information submitted could not be verified');
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
        return view('admin.form.create.admin', [
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
            'first_name.required' => 'The first name is required',
            'last_name.required' => 'The last name is required',
            'email.required' => 'The e-mail is required',
            'email.email' => 'The e-mail must be valid',
            'password.required' => 'The password is required',
            'password_confirm.required' => 'The password confirmation is required',
            'password_confirm.same' => 'The passwords do not match'
        ]);

        // Création d'un nouvel utilisateur
        $user = new User();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        // Encryption du mot de passe
        $user->password = Hash::make($request->password);

        // Gère le type de user qui est en train de se créer un compte
        // user public
        $previous_url = $request->header('referer');
        $public_url = URL::to('/') . '/account/create';

        if($previous_url == $public_url) {
            $user->privilege_id = 2;

            $user->save();
            auth()->login($user);

            // vérifier la session - redirection au cart
            if(session()->get('packages') !== null) {
                return redirect()
                    ->route('cart');
            }

            return redirect()
                ->route('homepage');
        } else {
            // user admin
            $user->privilege_id = 1;
            $user->save();

            return redirect()
                ->route('admin-dashboard')
                ->with('account-created', 'The account has been succesfully created');
        }
    }

    /**
     * Déconnexion de l'utilisateur
     *
     * @return void
     */
    public function logout() {

        auth()->logout();
        session()->forget('packages');

        return redirect()
            ->route('homepage');
    }
}
