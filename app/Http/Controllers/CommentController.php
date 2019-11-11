<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($id)
    {

        Article::find($id)->comments()->create($this->validateData());

        return redirect(url()->previous());
    }

    protected function validateData()
    {
        return request()->validate([
            'body' => 'required'
        ]);
    }
}
