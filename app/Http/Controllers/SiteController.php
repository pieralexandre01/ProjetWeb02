<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Affiche la page d'accueil
     *
     */
    public function index() {
        return view('index');
    }
}
