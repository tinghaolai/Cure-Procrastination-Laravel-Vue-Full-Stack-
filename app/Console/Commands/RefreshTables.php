<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class RefreshTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:tables {onlyArticles?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cleaning all tables(articles, tags, comments)';

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
        if ($this->argument('onlyArticles') == null) {
            DB::table('tags')->delete();
            DB::table('taggables')->delete();
            DB::table('comments')->delete();
        }
        DB::table('articles')->delete();

        $this->info("tables deleted");
    }
}
