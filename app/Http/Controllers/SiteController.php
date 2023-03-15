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
        return view('index');
    }

    /**
     * Affiche la page À propos (about)
     *
     */
    public function showAbout() {
        return view('about');
    }

    /**
     * Affiche la page contact
     *
     */
    public function showContact() {
        return view('contact');
    }
}
