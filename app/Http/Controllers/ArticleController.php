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
            "title" => "Mirror World | Articles",
            "page" => "articles",
            "articles" => Article::all(),
            "categorie" => Category::with('articles')->get(),
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
            "title" => "Mirror World | " . Article::findOrFail($id)->title,
            "page" => "article",
            "article" => Article::findOrFail($id),
        ]);
    }


    /**
     * Affiche le formulaire d'ajout d'un article
     *
     * @return void
     */
    public function create() {
        return view('admin.form.create.article', [
            'title' => 'MW | Article | Create',
            'page' => "article-create",
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
            "title.required" => "The title is required",
            "title.max" => "The title must be 50 characters or less",
            "text.required" => "The text is required",
            "user_id.required" => "The user is required",
            "user_id.numeric" => "The user id is required",
            "category.required" => "The category is required",
            "category.numeric" => "The category id is required",
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
            "title" => 'MW | Article | Modify',
            "page" => "article-edit",
            "article" => Article::findOrFail($id),
            "categories" => Category::all(),
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
            "title.required" => "The title is required",
            "title.max" => "The title must be 50 characters or less",
            "text.required" => "The text is required",
            "user_id.required" => "The user is required",
            "user_id.numeric" => "The user id is required",
            "category.required" => "The category is required",
            "category.numeric" => "The category id is required",
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
