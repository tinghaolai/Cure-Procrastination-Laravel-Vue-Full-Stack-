<?php

use Illuminate\Database\Seeder;
use App\Article;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Article::all() as $article) {
            if (rand(1, 10) >= 5) {
                $article->comments()->create(['body' => 'testComment']);
            }
        }
    }
}
