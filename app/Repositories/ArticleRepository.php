<?php

namespace App\Repositories;

use App\Article;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;

class ArticleRepository implements ArticleRepositoryInterface
{
    private $recentNum = -5;
    private $paginateNum = 6;
    public function allArticles()
    {
        $paginateNum = 6;
        return $articles = app(Pipeline::class)
            ->send(Article::query())
            ->through([
                \App\QueryFilters\Active::class,
                \App\QueryFilters\Sort::class,
            ])
            ->thenReturn()
            //->get();
            ->paginate($paginateNum);
    }

    public function searchArticle($article)
    {
        return tap(
            Article::with('comments', 'tags')->findOrFail($article),
            function ($article) { }
        );
    }

    public function getRecentArticle()
    {
        /*
        *****
        Figure it out why this doesnt work, the next one works
        *****
        return Article::all()->take($this->recentNum)->map(
            function ($article) {
                $article->title = "123";
            }
        );
        */
        return tap(
            Article::all()->take($this->recentNum),
            function ($recent) {
                $recent->map(
                    function ($article) {
                        $article->sidebar_title = Str::getCreatedDay($article->title, $article->created_at);
                    }
                );
            }
        );
    }


    public function getArticleByTag($tag_id)
    {

        return Article::whereHas('tags', function ($query) use ($tag_id) {
            $query->where('id', $tag_id);
        })->paginate($this->paginateNum);
    }

    public function addViewCount($article)
    {
        //sleep(30);
        $newViewedCount = $article->viewed + 1;
        $article->update(['viewed' => $newViewedCount]);
    }
}
