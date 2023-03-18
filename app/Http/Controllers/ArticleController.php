<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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
            "title" => "Mirror World | Articles"
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
            "title" => Article::findOrFail($id)->title,
        ]);
    }


    /**
     * Affiche le formulaire d'ajout d'un article
     *
     * @return void
     */
    public function create() {
        return view('admin.form.create.article', [
            "categories" => Category::all()
        ]);
    }


    /**
     * Enregistre un article
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {
        // Valider les champs
        $request->validate([
            "title" => "required|max:50",
            "text" => "required",
            "user_id" => "required|numeric",
            "category" => "required|numeric",
        ], [
            "title.required" => "Title is required",
            "title.max" => "Title must be 50 characters or less",
            "text.required" => "Text is required",
            "user_id.required" => "User is required",
            "user_id.numeric" => "User id is required",
            "category.required" => "Category is required",
            "category.numeric" => "Category id is required",
        ]);

        // Créer
        $article = new Article;
        $article->title = $request->title;
        $article->text = $request->text;
        $article->user_id = $request->user_id;
        $article->category_id = $request->category;

        // Enregistrer
        $article->save();

        return redirect()
            ->route('admin-dashboard')
            ->with('article-create', 'The article has been successfully saved');
    }


    /**
     * Affiche le formulaire de modification d'un article
     *
     * @param int $id
     * @return void
     */
    public function edit($id) {
        return view('admin.form.modify.article', [
            "article" => Article::findOrFail($id),
            "categories" => Category::all()
        ]);
    }


    /**
     * Modifie un article
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, $id) {
        // Valider les champs
        $request->validate([
            "title" => "required|max:50",
            "text" => "required",
            "user_id" => "required|numeric",
            "category" => "required|numeric",
        ], [
            "title.required" => "Title is required",
            "title.max" => "Title must be 50 characters or less",
            "text.required" => "Text is required",
            "user_id.required" => "User is required",
            "user_id.numeric" => "User id is required",
            "category.required" => "Category is required",
            "category.numeric" => "Category id is required",
        ]);

        // Modifier
        $article = Article::findOrFail($id);

        $article->title = $request->title;
        $article->text = $request->text;
        $article->user_id = $request->user_id;
        $article->category_id = $request->category;

        // Enregistrement
        $article->save();

        return redirect()
            ->route('admin-dashboard')
            ->with('article-edit', 'The article has been successfully modified');
    }


    /**
     * Supprime un article
     *
     * @param int $id
     * @return void
     */
    public function destroy($id) {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()
            ->route('admin-dashboard')
            ->with('article-delete', 'The article has been successfully deleted');
    }
}
