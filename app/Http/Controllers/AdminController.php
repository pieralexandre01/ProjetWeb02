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
            'user_admin' => User::where('privilege_id', 1)->get(),
            'articles' => Article::all(),
            'activities' => Activity::all(),
            'reservations' => Reservation::all(),
            'user_public' => User::where('privilege_id', 2)->get()
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


    // Bloquer un compte, soft deleting (mettre un timestamp dans la colonne deleted_at)


    // Débloquer un compte

}
