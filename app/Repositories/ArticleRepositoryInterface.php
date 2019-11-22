<?php

namespace App\Repositories;

interface ArticleRepositoryInterface
{
    public function allArticles();

    public function searchArticle($article);

    public function getRecentArticle();

    public function getArticleByTag($tag_id);

    public function addViewCount($article);
}
