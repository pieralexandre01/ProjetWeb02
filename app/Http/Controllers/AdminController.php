<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Affiche le dashboard de l'administrateur
     *
     */
    public function showDashboardAdmin() {
        return view('admin.dashboard');
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
