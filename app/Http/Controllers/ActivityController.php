<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Affiche la page d'activités (activities)
     *
     */
    public function show() {
        return view('activities', [
            "activities" => Activity::all(),
            "title" => "Mirror World | Activities"
        ]);
    }

    // JACKIE - AJOUT -----------------------------------------------------------------------------
    // Afficher le formulaire de création d'une activité

    // JACKIE - AJOUT -----------------------------------------------------------------------------
    // Création d'une activité
    // Ne pas oublier qu'il y a une image à traiter


    // PAT - MODIFICATION -----------------------------------------------------------------------------
    // Afficher le formulaire de modification d'une activité

    // PAT - MODIFICATION -----------------------------------------------------------------------------
    // Modification d'une activité
    // Ne pas oublier qu'il y a une image à traiter
    // S'il n'y a pas d'image qui est submited, conserver l'ancienne
    // Si non, écraser la valeur de l'ancienne par la nouvelle

    // JACKIE - SUPPRIMER -----------------------------------------------------------------------------
    // Supprimer une activité
}
