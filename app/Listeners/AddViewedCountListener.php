<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repositories\ArticleRepositoryInterface;

class AddViewedCountListener implements ShouldQueue
{
    //  $ php artisan queue:work       <-execute the queue
    //  $ php artisan queue:listen     <-keep listening the queue
    /**
     * Create the event listener.
     *
     * @return void
     */

    private $articleRepository;

    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->articleRepository->addViewCount($event->article);
        /*
        $article = $event->article;
        sleep(30);
        $newViewedCount = $article->viewed + 1;
        $article->update(['viewed' => $newViewedCount]);
        */
    }
}
