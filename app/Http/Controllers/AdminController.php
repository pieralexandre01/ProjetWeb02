<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Reservation;
use App\Models\User;
use App\Rules\UniqueEmailNotSoftDeleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminController extends Controller
{

    /**
     * Affiche le dashboard de l'administrateur
     *
     * @return void
     */
    public function showDashboardAdmin() {
        return view('admin.dashboard', [
            "title" => "MW | Admin | Dashboard",
            "page" => "admin-dashboard",
            'users_admin' => User::withTrashed()->where('privilege_id', 1)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get(),
            'articles' => Article::all(),
            'activities' => Activity::all(),
            'reservations' => Reservation::all(),
            'users_public' => User::withTrashed()->where('privilege_id', 2)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get()
        ]);
    }

    /**
     * Affiche le formulaire de modification de compte Public
     *
     * Le formulaire a besoin des informations sur le user à modifier
     *
     * @param int $id Id du user à modifier
     */
    public function editUser($id) {
        return view('admin.form.modify.user', [
            "title" => "MW | User | Modify",
            "page" => "edit-user",
            "user" => User::findOrFail($id),
        ]);
    }

    /**
     * Affiche le formulaire de modification de compte Public
     *
     * Le formulaire a besoin des informations sur le user à modifier
     *
     * @param int $id Id du user à modifier
     */
    public function editAdmin($id) {
        return view('admin.form.modify.admin', [
            "title" => "MW | Admin | Modify",
            "page" => "edit-admin",
            "user" => User::findOrFail($id),
        ]);
    }

    /**
     * Traite la modification d'un user
     *
     * @param Request $request Données pour la modification
     * @param int $id Id du user à modifier
     */
    public function updateUser(Request $request, $id) {
        // Valider
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required', 'email', new UniqueEmailNotSoftDeleted],
        ], [
            'first_name.required' => 'The first name is required',
            'last_name.required' => 'The last name is required',
            'email.required' => 'The e-mail is required',
            'email.email' => 'The e-mail must be valid',
        ]);

        $user = User::findOrFail($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        // Gère le type de user à modifier
        // if($request->privilege_type == 'admin') {
        //     $user->privilege_id = 1;
        // } elseif ($request->privilege_type == 'public') {
        //     $user->privilege_id = 2;
        // }

        // Enregistrement
        $user->save();

        return redirect()
            ->route('admin-dashboard')
            ->with('account-edit', "The user's account has been succesfully modified");
    }


    public function editPassword($id) {
        return view('admin.form.modify.password', [
            "title" => "MW | Admin | Modify PW",
            "page" => "edit-password",
            "user" => User::findOrFail($id),
        ]);
    }


    public function updatePassword(Request $request, $id) {
        // Valider
        $request->validate([
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ], [
            'password.required' => 'The password is required',
            'password_confirm.required' => 'The password confirmation is required',
            'password_confirm.same' => 'The passwords do not match'
        ]);

        $user = User::findOrFail($id);

        $user->password = $request->password;
        $user->password_confirm = $request->password_confirm;

        // Enregistrement
        $user->save();

        // Retourner à la page de modif du user admin-edit OU user-edit ?
        // /admin/edit/{id}
        // /admin/user/edit/{id}

        $previous_url = $request->header('referer');
        // problème : le previous_url sera le form de changement de pw qui est le même pour les 2 types de user.
        // utiliser le privilege->id pour déterminer sur quelle page retouner??

        // return redirect()
        //     ->back
        //     ->with('password-edit', "The user's password has been succesfully modified");
    }


    /**
     * Soft delete (bloque) un utilisateur
     *
     * @param int $id
     * @return void
     */
    public function block($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin-dashboard')
            ->with('user-blocked', 'The user has been succesfully blocked');
    }

    /**
     * Débloque un utilisateur
     *
     * @param int $id
     * @return void
     */
    public function unblock($id) {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
        return redirect()
            ->route('admin-dashboard')
            ->with('user-unblocked', 'The user has been successfully unblocked');
    }
}
