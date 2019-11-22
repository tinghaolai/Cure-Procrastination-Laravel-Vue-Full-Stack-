<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CleanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        DB::table('taggables')->delete();
        DB::table('comments')->delete();
        DB::table('articles')->delete();
    }
}
