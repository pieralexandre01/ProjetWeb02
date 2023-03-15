<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Affiche la page d'articles
     *
     * @return void
     */
    public function show() {
        return view('articles', [
            'articles' => Article::all(),
        ]);
    }

    /**
     * Affiche un article selon l'id
     *
     * @param int $id
     * @return void
     */
    public function showById($id) {
        return view('article', [
            "article" => Article::findOrFail($id),
        ]);
    }

    // Afficher le formulaire de création d'un article

    // Création d'un article

    // Afficher le formulaire de modification d'un article

    // Modification d'un article

    // Supprimer une activité
}
