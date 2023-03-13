<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get("/json/articles.json");

        $articles = json_decode($json, true);

        foreach($articles as $article) {
            Article::create([
                'title' => $article["title"],
                'text' => $article["text"],
                'user_id' => $article["user_id"],
                'category_id' => $article["category_id"],
            ]);
        };
    }
}
