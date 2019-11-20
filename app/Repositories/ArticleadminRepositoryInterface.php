<?php

namespace App\Repositories;

interface ArticleadminRepositoryInterface
{
    public function all();

    public function store($request);

    public function update($article, $request);

    public function validateData();

    public function storeImage($article);
}
