<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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
    }
}
