<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Repositories\ArticleadminRepositoryInterface;


class ArticleadminController extends Controller
{


    public function __construct(ArticleadminRepositoryInterface $articleadminRepository)
    {
        //$this->middleware('auth');
        $this->articleadminRepository = $articleadminRepository;
    }

    public function index()
    {
        $articles = $this->articleadminRepository->all();
        return view('articleadmin.index', compact('articles'));
    }

    public function create()
    {
        $article = new Article();
        return view('articleadmin.create', compact('article'));
    }

    public function store(Request $request)
    {
        $article = $this->articleadminRepository->store($request);
        return redirect('/articleadmin/' . $article->id);
    }


    public function show(Article $article)
    {
        return view('articleadmin.show', compact('article'));
    }

    public function edit(Article $article, Request $request)
    {
        return view('articleadmin.edit', compact('article'));
    }


    public function update(Article $article, Request $request)
    {
        $this->articleadminRepository->update($article, $request);
        return redirect('/articleadmin');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articleadmin');
    }
}
