<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller {

    /**
     * Enregistre une réservation dans la bdd suite au paiement
     *
     * @return void
     */
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

    /**
     * Supprime une réservation de la bdd
     *
     * @param int $id
     * @return void
     */
    public function destroy($id) {
        $reservation = Reservation::findOrFail($id);

        // Vérification de la date

        // $reservation->delete();

        // return redirect()
        //     ->route('dashboard')
        //     ->with('reservation-delete', 'The reservation has been successfully deleted');
    }
}
