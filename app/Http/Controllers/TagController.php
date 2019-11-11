<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Tag;

class TagController extends Controller
{


    public function create()
    {
        $tags = Tag::all();
        return view('articleadmin.tag.create', compact('tags'));
    }


    public function store()
    {
        $tag = Tag::create($this->validateData());

        return redirect(url()->previous());
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect(url()->previous());
    }

    protected function validateData()
    {
        return request()->validate([
            'name' => 'required'
        ]);
    }
}
