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
            "packages" => Package::all(),
            "title" => "Mirror World | Packages",
            "page" => "packages",
        ]);
    }

    public function addToCart(Request $request, $id) {

        $request->validate([
            'package_id' => 'required|numeric',
            'package_quantity' => 'required|integer|min:1|max:4',
        ], [
            'package_id.required' => "The package ID is required",
            'package_id.numeric' => "The package ID must be submitted",
            'package_quantity.required' => "The quantity is required",
            'package_quantity.integer' => "The package's quantity must be an integer",
            'package_quantity.min' => "The package's quantity must be minimum 1",
            'package_quantity.max' => "The package's quantity must be maximum 4",
        ]);

        $package_id = $request->package_id;
        $package_quantity = $request->package_quantity;

        $package = Package::findOrFail($package_id);

        // enregistrer dans la session
        $cart = session()->get('package');

        if($cart == null) {
            $cart = [];
        }

        $cart[] = $package;

        session()->put('package', $cart);

        // vérifier si connecté
        // si non, connexion + retour au forfait désiré
        // si pas de compte ?????
        if ( ! Auth::check()) {
            return redirect()
                ->route('login', [
                    'package_id' => $package_id,
                    'package_url' => URL::to('/') . '/packages',
                    'package_quantity' => $package_quantity,
                ]);
        }

        // si oui, permettre l'ajout au panier
        // récupérer le forfait



        // id, nom, qty, prix, prix total, taxes, etc.

        // redirection au panier avec affichage de la session
    }
}
