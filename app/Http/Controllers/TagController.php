<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class TagController extends Controller
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
