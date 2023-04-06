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
     * @return void
     */
    public function show() {
        return view('activities', [
            "title" => "Mirror World | Activities",
            "page" => "activities",
            "activities" => Activity::all(),
        ]);
    }

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
     * Enregistre une nouvelle activité
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {

        // Valider le nb. max d'activités // 27
        $total_activities = Activity::all()->count();

        if ($total_activities >= 27) {
            return redirect()
                ->route('admin-dashboard')
                ->with('activity-max', 'The maximum number of activities is 27. Delete an existing activity in order to add a new one.');
        }

        // Valider les champs
        $request->validate([
            "title" => "required|max:25",
            "subcategory" => "max:25",
            "description" => "required",
            "image" => "required|mimes:png,jpg,jpeg,webp",
            "date" => "required|date"
        ], [
            "title.required" => "The title is required",
            "title.max" => "The title must be 25 characters or less",
            "subcategory.max" => "The subcategory must be 25 characters or less",
            "description.required" => "The description is required",
            "image.required" => "The image is required",
            "image.mimes" => "The file must have one of the following extensions: .png, .jpg, .jpeg or .webp",
            "date.required" => "The date and time are required",
            "date.date" => "The date format must be respected",

        ]);

        // Créer
        $activity = new Activity;
        $activity->title = $request->title;
        $activity->subcategory = $request->subcategory;
        $activity->description = $request->description;

        // Traitement de l'image
        $image = $request->file('image');
        // Générer un nom de fichier unique
        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
        // Déplacer
        $image->move(public_path('media/images/activities'), $image_name);
        // Enregistrer le chemin
        $activity->image = 'media/images/activities/' . $image_name;

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
            "subcategory" => "max:25",
            "description" => "required",
            "date" => "required|date"
        ], [
            "title.required" => "The title is required",
            "title.max" => "The title must be 25 characters or less",
            "subcategory.max" => "The subcategory must be 25 characters or less",
            "description.required" => "The description is required",
            "date.required" => "The date and time are required",
            "date.date" => "The date format must be respected",
        ]);

        $activity = Activity::findOrFail($id);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            // Téléverser la nouvelle image
            $img = $request->file('image');
            // Générer un nom de fichier unique
            $image_name = uniqid() . '.' . $img->getClientOriginalExtension();
            // Déplacer
            $img->move(public_path('media/images/activities'), $image_name);
            // Enregistrer le chemin
            $image = 'media/images/activities/' . $image_name;
        } else {
            // Utiliser l'ancienne valeur de l'image
            $image = $activity->image;
        }

        // Modifier
        $activity->title = $request->title;
        $activity->subcategory = $request->subcategory;
        $activity->description = $request->description;
        $activity->image = $image;
        $activity->date = $request->date;

        // Enregistrement
        $activity->save();

        return redirect()
            ->route('admin-dashboard')
            ->with('activity-edit', 'The activity has been successfully modified');
    }

    /**
     * Supprime une activité
     *
     * @param int $id
     * @return void
     */
    public function destroy($id){
        $activity = Activity::findOrFail($id);
        $activity->delete();

        return redirect()
                ->route('admin-dashboard')
                ->with('activity-delete', 'The activity has been successfully deleted');
    }
}
