<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticleadminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::all();

        return view('articleadmin.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article();
        $tags = Tag::all();
        return view('articleadmin.create', compact('article', 'tags'));
    }

    public function store(Request $request)
    {
        $article = Article::create($this->validateData());
        //$article->tags()->attach();
        foreach ($request->input('tag') as $tag_id) {
            $article->tags()->attach($tag_id);
        }
        return redirect('/articleadmin/' . $article->id);
    }


    public function show(Article $article)
    {
        return view('articleadmin.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $tags = Tag::all();
        return view('articleadmin.edit', compact('article', 'tags'));
    }


    public function update(Article $article)
    {
        $article->update($this->validateData());

        return redirect('/articleadmin');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/articleadmin');
    }

    protected function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
    }
}
