<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Affiche le dashboard de l'utilisateur public
     *
     */
    public function showDashboard() {
        $user = auth()->user();

        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('user.dashboard', [
            'reservations' => $reservations,
            'title' => 'Mirror World | Reservations'
        ]);
    }

    // Réserver un forfait *************************
    // Poser question à Julien : Comment entrer une valeur dans la table pivot dans Laravel ?
}
