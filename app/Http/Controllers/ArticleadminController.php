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
        $this->middleware('auth');
        $this->middleware('admin')->only(['store', 'update', 'destroy', 'restore_deleted', 'forceDelete_deleted']);
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
        //$this->authorize('create', Article::class);

        $article = $this->articleadminRepository->store($request);
        return redirect('/articleadmin/' . $article->id)->with('success', 'Article added');
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
        return redirect('/articleadmin')->with('success', 'Edit success');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articleadmin')->with('success', 'Article deleted(soft)');
    }

    public function index_deleted()
    {
        $articles = $this->articleadminRepository->getAllDeleted();
        return view('articleadmin.deleted.index_deleted', compact('articles'));
    }

    public function show_deleted($article_id)
    {
        $article = $this->articleadminRepository->findDeleted($article_id);
        return view('articleadmin.deleted.show_deleted', compact('article'));
    }

    public function restore_deleted($article_id)
    {
        $this->articleadminRepository->restore($article_id);
        return redirect('/articleadmin')->with('success', 'Article restored');
    }

    public function forceDelete_deleted($article_id)
    {
        $this->articleadminRepository->forceDelete($article_id);
        return redirect('/articleadmin')->with('success', 'Article completely deleted');
    }
}
