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

    // Réserver un forfait *************************
    // Poser question à Julien : Comment entrer une valeur dans la table pivot dans Laravel ?
}
