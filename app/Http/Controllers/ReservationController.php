<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function store() {


        // enregistrer les réservations dans la bdd


        // Si réussi
        // Vider la session
        session()->forget('packages');

        // retourner le user sur ... son dashboard ?
    }
}
