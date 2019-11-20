<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Carbon\Carbon;
use App\Tag;

class Article extends Model
{
    protected $guarded = [];


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public static function allArticles()
    {
        $paginateNum = 6;
        return $articles = app(Pipeline::class)
            ->send(Article::query())
            ->through([
                \App\QueryFilters\Sort::class,
            ])
            ->thenReturn()
            //->get();
            ->paginate($paginateNum);
    }
}
