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

        // enregistrer dans la session
        $cart = session()->get('packages');

        if($cart == null) {
            $cart = [];
        }

        $cart[] = [
            "package_id" => $request->package_id,
            "package_quantity" => $request->package_quantity
        ];

        session()->put('packages', $cart);

        if ( ! Auth::check()) {
            return redirect()
                ->route('login');
        }

        return redirect()
            ->route('cart');
    }
}
