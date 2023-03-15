<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * Affiche la page d'accueil (homepage)
     *
     */
    public function index() {
        return view('index', [
            "title" => "Mirror World | Homepage"
        ]);
    }

    /**
     * Affiche la page À propos (about)
     *
     */
    public function showAbout() {
        return view('about', [
            "title" => "Mirror World | About"
        ]);
    }

    /**
     * Affiche la page contact
     *
     */
    public function showContact() {
        return view('contact', [
            "title" => "Mirror World | Contact"
        ]);
    }
}
