<?php

namespace App\Providers;

use App\Tag;
use App\Http\View\Composers\ChannelsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['article.index', 'article.show', 'article.index', 'articleadmin.edit', 'articleadmin.create'], function ($view) {
            $view->with('tags', Tag::all());
        });

        Str::macro('TimeReformat', function ($time) {
            return 'AB-';
        });
    }
}
