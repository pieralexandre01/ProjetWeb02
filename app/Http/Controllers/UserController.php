<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Affiche le dashboard de l'utilisateur public
     *
     */
    public function showDashboard() {
        return view('user.dashboard');
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


    // Réserver un forfait *************************
    // Poser question à Julien : Comment entrer une valeur dans la table pivot dans Laravel ?
}
