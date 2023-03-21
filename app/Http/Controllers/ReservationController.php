<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller {

    public function store() {

        $packages = session()->get('packages');

        $user = Auth::user();

        // Enregistrement des réservations dans la BDD
        foreach ($packages as $package) {
            $reservation = new Reservation();
            $reservation->user_id = $user->id;
            $reservation->package_id = $package['package_id'];
            $reservation->quantity = $package['package_quantity'];

            $reservation->save();
        }

        // Vide la session
        session()->forget('packages');

        // Redirige le user vers son dashboard
        return redirect()
            ->route('dashboard');
    }
}
