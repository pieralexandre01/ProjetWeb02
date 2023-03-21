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
            'title' => 'Mirror World | Reservations',
            "page" => "dashboard",
            'reservations' => $reservations,
        ]);
    }

    /**
     * Affiche le cart de l'utilisateur public
     *
     */
    public function showCart() {

        $packages = session()->get('packages');
        $cart = [];
        $total_price = 0;

        foreach($packages as $package) {

            $package_infos = Package::where(['id' => $package["package_id"]])->first();

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
        ])
        // ->with('variableVue', $total_price)
        ;
    }
}
