<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    /**
     * Affiche la page d'activités (activities)
     *
     */
    public function show() {
        return view('activities', [
            "title" => "Mirror World | Activities",
            "page" => "activities",
            "activities" => Activity::all(),
        ]);
    }

    // JACKIE - AJOUT -----------------------------------------------------------------------------
    /**
     * Affiche le formulaire de création d'une activité
     *
     * @return void
     */
    public function create() {
        return view('admin.form.create.activity', [
            'title' => 'MW | Activity | Create',
            'page' => "activity-create",
        ]);
    }

    /**
     * Enregistre une activité
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {
        // Valider les champs
        $request->validate([
            "title" => "required|max:25",
            "description" => "required",
            "image" => "required|mimes:png,jpg,jpeg,webp",
            "date" => "required|date"
        ], [
            "title.required" => "Title is required",
            "title.max" => "Title must be 25 characters or less",
            "description.required" => "Description is required",
            "image.required" => "Image is required",
            "image.mimes" => "File must have one of the following extensions: .png, .jpg, .jpeg ou .webp",
            "date.required" => "Date and time are required",
            "date.date" => "Date format must be respected",

        ]);

        // Créer
        $activity = new Activity;
        $activity->title = $request->title;
        $activity->description = $request->description;

        // Traitement de l'image
        Storage::putFile('public/imgages/activities', $request->image);
        $activity->image = '/storage/imgages/' . $request->image->hashName();

        $activity->date = $request->date;

        // Enregistrer
        $activity->save();

        return redirect()
            ->route('admin-dashboard')
            ->with('activity-create', 'The activity has been successfully created');
    }

    /**
     * Affiche le formulaire de modification d'une activité
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        return view('admin.form.modify.activity', [
            "title" => 'MW | Activity | Create',
            "page" => "activity-create",
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
        ], [
            "title.required" => "Title is required",
            "title.max" => "Title must be 25 characters or less",
            "description.required" => "Description is required",
        ]);

        $activity = Activity::findOrFail($id);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Téléverser la nouvelle image
            $path = $request->file('image')->store('public/images/activities');
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

    /**
     * Supprime une activité
     *
     * @param INT $id
     * @return void
     */
    public function destroy($id){
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()
                ->route('admin-dashboard')
                ->with('activity-deleted-success', 'The activity has been successfully deleted');
    }
}
