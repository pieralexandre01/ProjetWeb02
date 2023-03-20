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
            "title" => "Mirror World | Activities",
            "page" => "activities",
        ]);
    }

    // JACKIE - AJOUT -----------------------------------------------------------------------------
    // Afficher le formulaire de création d'une activité

    // JACKIE - AJOUT -----------------------------------------------------------------------------
    // Création d'une activité
    // Ne pas oublier qu'il y a une image à traiter


    /**
     * Affiche le formulaire de modification d'une activité
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        return view('admin.form.modify.activity', [
            "activity" => Activity::findOrFail($id),
        ]);
    }


    /**
     * Modifie une activité
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id) {
        // Valider les champs
        $request->validate([
            "title" => "required|max:25",
            "description" => "required",
            "activity_id" => "required|numeric",
        ], [
            "title.required" => "Title is required",
            "title.max" => "Title must be 25 characters or less",
            "description.required" => "Description is required",
            "activity_id.required" => "Activity is required",
            "activity_id.numeric" => "Activity id is required",
        ]);

        $activity = Activity::findOrFail($id);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Téléverser la nouvelle image
            $path = $request->file('image')->store('public/images');
            $image = basename($path);
        } else {
            // Utiliser l'ancienne valeur de l'image
            $image = $activity->image;
        }

        // Modifier
        $activity->title = $request->title;
        $activity->description = $request->description;
        $activity->image = $image;

        // Enregistrement
        $activity->save();

        return redirect()
            ->route('admin-dashboard')
            ->with('activity-edit', 'The activity has been successfully modified');
    }


    // JACKIE - SUPPRIMER -----------------------------------------------------------------------------
    // Supprimer une activité
}
