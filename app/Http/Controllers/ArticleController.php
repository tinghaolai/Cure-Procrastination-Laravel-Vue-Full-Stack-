<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
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
        $comments = Comment::where('commentable_id', $article->id)->get();

        return view('article.show', compact('article', 'comments'));
    }
}
