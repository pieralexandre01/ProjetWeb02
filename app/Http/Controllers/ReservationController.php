<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

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
            ->route('dashboard')
                ->with('reservation-success', 'Thank you for you purchase. We look forward for seeing you!');
    }

    /**
     * Supprime une réservation de la bdd
     *
     * @param int $id
     * @return void
     */
    public function destroy(Request $request, $id) {
        $reservation = Reservation::findOrFail($id);

        $previous_url = $request->header('referer');
        $public_url = URL::to('/') . '/dashboard';

        // vérifier si le festival est commencé -> si oui, ne pas permettre l'annulation
        if(now() < $reservation->package->strat_date) {
            // provenant du dashboard public
            if($previous_url == $public_url) {
                return redirect()
                ->route('dashboard');
            }
            // provenant du dashboard public
            return redirect()
                    ->route('admin-dashboard');
        }

        $reservation->delete();

        // rediriger vers dashboard public OU admin selon provenance du user
        if($previous_url == $public_url) {
            return redirect()
            ->route('dashboard')
            ->with('reservation-delete', 'The reservation has been successfully cancelled');
        }
        // provenant du dashboard public
        return redirect()
            ->route('admin-dashboard')
            ->with('reservation-delete', 'The reservation has been successfully cancelled');
    }
}
