<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Affiche le dashboard de l'administrateur
     *
     */
    public function showDashboardAdmin() {
        return view('admin.dashboard', [
            'user_admin' => User::withTrashed()->where('privilege_id', 1)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get(),
            'articles' => Article::all(),
            'activities' => Activity::all(),
            'reservations' => Reservation::all(),
            'user_public' => User::withTrashed()->where('privilege_id', 2)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get()
        ]);
    }

    // Afficher la page modification de compte Public
    //
    // Aller récupérer les anciennes informations sauf password
    // Mettre un input type Hidden de type = public


    // Afficher la page modification de compte Admin
    //
    // Aller récupérer les anciennes informations sauf password


    // Modification de compte
    //
    // Vérifier si les inputs password et confirm password sont vides
    // Si oui, récupérer l'ancien password pour remettre cette valeur dans la BDD
    // Si non, faire les vérifications habituelles

    /**
     * Soft delete (bloque) un utilisateur
     *
     * @param [type] $id
     * @return void
     */
    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin')
            ->with('user-blocked-success', 'User has been blocked successfully');
    }

    // Débloquer un compte

}
