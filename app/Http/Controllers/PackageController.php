<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class PackageController extends Controller
{
    /**
     * Affiche la page des forfaits (packages)
     *
     */
    public function show() {
        return view('packages', [
            "title" => "Mirror World | Packages",
            "page" => "packages",
            "packages" => Package::all(),
        ]);
    }

    /**
     * Ajouter un forfait au panier
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function addToCart(Request $request, $id) {

        $request->validate([
            'package_id' => 'required|numeric',
            'package_quantity' => 'required|integer|min:1|max:4',
        ], [
            'package_id.required' => "The package ID is required",
            'package_id.numeric' => "The package ID must be submitted",
            'package_quantity.required' => "The quantity is required",
            'package_quantity.integer' => "The package's quantity must be a number",
            'package_quantity.min' => "The package's quantity must be minimum 1",
            'package_quantity.max' => "The package's quantity must be maximum 4",
        ]);

        // création du panier et enregistrement dans la session
        $cart = session()->get('packages');

        // initiation du tableau
        if($cart == null) {
            $cart = [];
        }

        // insertion des données dans le panier
        $cart[] = [
            "package_id" => $request->package_id,
            "package_quantity" => $request->package_quantity
        ];

        // envoie du panier dans la session
        session()->put('packages', $cart);

        // redirection à la page de login si le user n'est pas connecté
        if ( ! Auth::check()) {
            return redirect()
                ->route('login')
                    ->with('connexion-cart', 'You must be logged in to add a package to your cart');
        }

        // redirection au panier sur le user est connecté
        return redirect()
            ->route('cart');
    }
}
