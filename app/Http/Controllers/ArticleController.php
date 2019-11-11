<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use App\Tag;

class ArticleController extends Controller
{
    public function index()
    {
        //$articles = Article::paginate(6);
        $articles = Article::with('tags')->paginate(6);

        return view('article.index', compact('articles'));
    }

    public function show($article)
    {
        //$customer = \App\Customer::findOrFail($customerId);
        $article = Article::with('comments')->findOrFail($article);

        return view('article.show', compact('article'));
    }
}
