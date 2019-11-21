<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use App\Article;

//vendor/bin/phpunit --filter ArticleTest

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_logged_in_users_can_see_articleadmin()
    {
        $response = $this->get('/articleadmin')->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_users_can_see_articles()
    {
        $this->actingAs(factory(User::class)->create());

        $response = $this->get('/articleadmin')
            ->assertOk();
    }

    /** @test */
    public function an_article_can_be_added()
    {
        Event::fake();

        $this->withoutExceptionHandling();

        $this->actingAs(factory(User::class)->create([
            'email' => 'admin@admin.com',
        ]));

        $response = $this->post('/articleadmin', [
            'title' => 'test title',
            'body' => 'test body',
        ]);

        $this->assertCount(1, Article::all());
    }
}
