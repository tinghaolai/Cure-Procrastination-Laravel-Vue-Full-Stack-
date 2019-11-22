<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $article_amount = 50;

        //\factory(Article::class, (int) $this->argument('article'))->create();
        \factory(Article::class, (int) $article_amount)->create();


        foreach (Article::all() as $article) {
            foreach (\App\Tag::all() as $tag) {
                if (rand(1, 10) >= 5) {
                    $article->tags()->attach($tag->id);
                }
            }

            if (rand(1, 10) >= 5) {
                $article->update(['image' => 'defaults/' . rand(1, 3) . '.jpg']);
            }
        }
    }
}
