<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    protected $paginateNum = 6;
    protected $recentNum = -5;

    public function index()
    {
        //$articles = Article::paginate(6);
        $articles = Article::with('tags')->paginate($this->paginateNum);
        $recent = $this->getRecentArticle();
        return view('article.index', compact('articles', 'recent'));
    }

    public function show($article)
    {
        //$customer = \App\Customer::findOrFail($customerId);

        $article = tap(
            Article::with('comments', 'tags')->findOrFail($article),
            function ($article) {;
            }
        );





        $recent = $this->getRecentArticle();
        return view('article.show', compact('article', 'recent'));
    }


    public function tag_show($tag_id)
    {
        //$article = Tag::with('articles')->findOrFail($tag_id)->articles;
        //失敗了 得到array 無法paginate 但可得到id
        $articles = Article::whereHas('tags', function ($query) use ($tag_id) {
            $query->where('id', $tag_id);
        })->paginate($this->paginateNum);
        $recent = $this->getRecentArticle();
        //return view('article.tag.show', compact('tag_article', 'tags', 'recent'));
        return view('article.index', compact('articles', 'recent'));
    }


    protected function getRecentArticle()
    {
        return Article::all()->take($this->recentNum);
    }
}
