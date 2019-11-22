<?php

namespace App\Repositories;

use App\Article;
use Intervention\Image\Facades\Image;

class ArticleadminRepository implements ArticleadminRepositoryInterface
{
    public function all()
    {
        return Article::all();
    }

    public function store($request)
    {
        $article = Article::create($this->validateData());
        //$article->tags()->attach();
        if ($request->has('tag')) {
            foreach ($request->input('tag') as $tag_id) {
                $article->tags()->attach($tag_id);
            }
        }
        $this->storeImage($article);
        return $article;
    }

    public function update($article, $request)
    {
        $article->update($this->validateData());
        $article->tags()->detach();
        if ($request->has('tag')) {
            foreach ($request->input('tag') as $tag_id) {
                $article->tags()->attach($tag_id);
            }
        }
        if ($request->has('delImage')) {
            $article->update(array('image' => ''));
        }
        $this->storeImage($article);
    }

    public function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'file|image|max:5000',
        ]);
    }

    public function storeImage($article)
    {
        if (request()->has('image')) {

            $article->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
            $image = Image::make(public_path('storage/' . $article->image))->fit(400, 250);
            $image->save();
        }
    }

    public function getAllDeleted()
    {
        return Article::onlyTrashed()->get();
    }

    public function findDeleted($article_id)
    {
        return Article::withTrashed()->find($article_id);
    }

    public function restore($article_id)
    {
        Article::withTrashed()->find($article_id)->restore();
    }

    public function forceDelete($article_id)
    {
        Article::withTrashed()->find($article_id)->forceDelete();
    }
}
