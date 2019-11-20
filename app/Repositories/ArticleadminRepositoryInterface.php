<?php

namespace App\Repositories;

interface ArticleadminRepositoryInterface
{
    public function all();

    public function store($request);

    public function update($article, $request);

    public function validateData();

    public function storeImage($article);

    public function getAllDeleted();

    public function findDeleted($article_id);

    public function restore($article_id);

    public function forceDelete($article_id);
}
