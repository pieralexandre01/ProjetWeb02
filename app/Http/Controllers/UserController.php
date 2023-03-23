<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Affiche le dashboard publique
     *
     * @return void
     */
    public function showDashboard() {
        $user = auth()->user();

        $reservations = Reservation::where('user_id', $user->id)->get();

        return view('user.dashboard', [
            'title' => 'Mirror World | Reservations',
            "page" => "dashboard",
            'reservations' => $reservations,
        ]);
    }

    /**
     * Affiche le panier et les réservations dans la session
     *
     * @return void
     */
    public function showCart() {

        // récupérer la session
        $packages = session()->get('packages');

        // redirection panier vide
        if($packages == null) {
            return view('user.cart', [
                'title' => 'Mirror World | Cart',
                'page' => "cart",
                'packages' => null,
                'total_price' => null,
            ]);
        }

        // récupérer les forfaits de la bdd et stocker les infos dans la session
        $cart = [];
        $total_price = 0;

        foreach($packages as $package) {

            $package_infos = Package::where(['id' => $package["package_id"]])->first();

            // création du panier
            $cart[] = [
                "id" => $package_infos->id,
                "title" => $package_infos->title,
                "description" => $package_infos->description,
                "price" => $package_infos->price,
                "start_date" => $package_infos->start_date,
                "end_date" => $package_infos->end_date,
                "quantity" => $package["package_quantity"],
            ];

            $total_price += $package_infos->price * $package["package_quantity"];
        }

        return view('user.cart', [
            'title' => 'Mirror World | Cart',
            'page' => "cart",
            'packages' => $cart,
            'total_price' => $total_price,
        ]);
    }

    /**
     * Supprimer un forfait du panier (de la session)
     *
     * @param int $index
     * @return void
     */
    public function deletePackageFromCart($index) {
        $packages = session()->get('packages');

        array_splice($packages, $index, 1);

        session()->put('packages', $packages);

        return redirect()
            ->back();
    }
}
