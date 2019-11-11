<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(6);
        return view('article.index', compact('articles'));
    }

    public function show(Article $article)
    {
        //$customer = \App\Customer::findOrFail($customerId);

        return view('article.show', compact('article'));
    }
}
