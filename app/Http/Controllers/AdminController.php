<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Article;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    /**
     * Affiche le dashboard de l'administrateur
     *
     */
    public function showDashboardAdmin() {
        return view('admin.dashboard', [
            'user_admin' => User::withTrashed()->where('privilege_id', 1)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get(),
            'articles' => Article::all(),
            'activities' => Activity::all(),
            'reservations' => Reservation::all(),
            'user_public' => User::withTrashed()->where('privilege_id', 2)->orderByRaw('deleted_at IS NULL ASC, deleted_at ASC')->get()
        ]);
    }

    // Afficher la page modification de compte Public
    //
    // Aller récupérer les anciennes informations sauf password
    // Mettre un input type Hidden de type = public
    /**
     * Affiche le formulaire de modification de compte Public
     *
     * Le formulaire a besoin des informations sur le user à modifier
     *
     * @param int $id Id de la nouvelle à modifier
     */
    public function editUser($id){
        return view('admin.form.modify.user', [
            "user" => User::findOrFail($id),
        ]);
    }


    // Afficher la page modification de compte Admin
    //
    // Aller récupérer les anciennes informations sauf password
    /**
     * Affiche le formulaire de modification de compte Public
     *
     * Le formulaire a besoin des informations sur le user à modifier
     *
     * @param int $id Id de la nouvelle à modifier
     */
    public function editAdmin($id){
        return view('admin.form.modify.admin', [
            "user" => User::findOrFail($id),
        ]);
    }


    // Modification de compte
    //
    // Vérifier si les inputs password et confirm password sont vides
    // Si oui, récupérer l'ancien password pour remettre cette valeur dans la BDD
    // Si non, faire les vérifications habituelles
    /**
     * Affiche le dashboard de l'administrateur
     *
     */
    /**
     * Traite la modification d'une nouvelle
     *
     * @param Request $request Données pour la modification
     * @param int $id Id de la nouvelle à modifier
     */
    public function updateUser(Request $request, $id){
        // Valider
        $request->validate([
            "titre" => "required|max:255",
            "texte" => "required",
            // La règle 'nullable' est ajouté pour que Laravel sache que les autres règles n'auront peut-être pas à être appliquées si l'image n'a pas été reçue
            "image" => "mimes:png,jpg,jpeg,webp|nullable",
            "auteur_id" => "required|numeric",
            "categorie_id" => "required|numeric"
        ], [
            "titre.required" => "Le titre est requis",
            "titre.max" => "Le titre doit avoir 255 caractères ou moins",
            "texte.required" => "Le texte est requis",
            "auteur_id.required" => "L'auteur est requis",
            "auteur_id.numeric" => "L'id de l'auteur doit être soumis",
            "categorie_id.required" => "La catégorie est requise",
            "categorie_id.numeric" => "L'id de la catégorie doit être soumise"
        ]);

        // Récupération de la nouvelle ciblée
        $nouvelle = User::findOrFail($id);

        // Les "anciennes" valeurs sont écrasées par les nouvelles
        $nouvelle->titre = $request->titre;
        $nouvelle->texte = $request->texte;

        // Traitement de l'image: elle pourrait ne pas exister dans la requête actuelle
        if($request->image){
            Storage::putFile('public/img', $request->image);
            $nouvelle->image = '/storage/img/' . $request->image->hashName();
        }

        $nouvelle->longueur = Str::length($request->texte);
        $nouvelle->auteur_id = $request->auteur_id;
        $nouvelle->categorie_id = $request->categorie_id;

        // Sauvegarde dans la BDD
        $nouvelle->save();

        // Redirection avec confirmation
        return redirect()
                ->route('accueil')
                ->with('modification-nouvelle', 'La nouvelle a été modifiée!');
    }

    /**
     * Soft delete (bloque) un utilisateur
     *
     * @param [type] $id
     * @return void
     */
    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin')
            ->with('user-blocked-success', 'User has been blocked successfully');
    }

    // Débloquer un compte

}
