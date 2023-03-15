<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Affiche la page des forfaits (packages)
     *
     */
    public function show() {
        return view('packages', [
            "packages" => Package::all(),
            "title" => "Mirror World | Packages"
        ]);
    }
}
