<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Article;
use Illuminate\Support\Facades\DB;

class AutoAddingDataForTesting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:testdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adding articles, tags, comments, images';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $article_amount = $this->ask('How many articles you want to add?');

        //\factory(Article::class, (int) $this->argument('article'))->create();
        \factory(Article::class, (int) $article_amount)->create();

        $this->info("Article Added");

        DB::table('tags')->delete();
        $tech = \App\Tag::create([
            'name' => 'Tech'
        ]);
        $psycho = \App\Tag::create([
            'name' => 'Psycho'
        ]);

        $health = \App\Tag::create([
            'name' => 'health'
        ]);

        if ($this->confirm("Do you want to add comments")) {
            foreach (Article::all() as $article) {
                if (rand(1, 10) >= 5) {
                    $article->comments()->create(['body' => 'testComment']);
                }
            }
        }

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


        $this->info("Data setup complete!");
    }
}
