<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Str;
use App\Repositories\ArticleRepositoryInterface;
use App\Events\ArticleViewedEvent;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{
    //protected $paginateNum = 6;
    //private $recentNum = -5;
    private $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->middleware('locale');
    }


    public function index()
    {
        //$articles = Article::with('tags')->paginate($this->paginateNum);
        //**********理解為何下面寫法不用with tags

        $articles = $this->articleRepository->allArticles();
        $recent = $this->articleRepository->getRecentArticle();
        return view('article.index', compact('articles', 'recent'));
    }

    public function show($article)
    {
        $article = $this->articleRepository->searchArticle($article);
        $recent = $this->articleRepository->getRecentArticle();
        event(new ArticleViewedEvent($article));
        return view('article.show', compact('article', 'recent'));
    }


    public function tag_show($tag_id)
    {
        //$article = Tag::with('articles')->findOrFail($tag_id)->articles;
        //失敗了 得到array 無法paginate 但可得到id
        $articles = $this->articleRepository->getArticleByTag($tag_id);
        $recent = $this->articleRepository->getRecentArticle();
        //return view('article.tag.show', compact('tag_article', 'tags', 'recent'));
        return view('article.index', compact('articles', 'recent'));
    }


    public function add_session($session)
    {
        return back()->with('locale', $session);
    }
}
