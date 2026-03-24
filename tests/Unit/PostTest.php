<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\PostService;

// В Unit тестах мы тестируем логику метода. БД тут не нужна, тесты работают с объектом в памяти
class PostTest extends TestCase {
    use RefreshDatabase;

    public function test_long_title_gets_truncated() {
        $post = new Post(); // создаёт объект модели в памяти без записи в БД. Никакого SQL запроса не происходит
        $post->title = 'Hello world';
        $result = $post->getShortTitle(5);
        $this->assertEquals('Hello...', $result);
    }

    public function test_short_title() {
        $post = new Post();
        $post->title = 'Hi';
        $result = $post->getShortTitle(5);
        $this->assertEquals('Hi', $result);
    }

    public function test_post_belongs_to_user() {
        User::factory()->create();
        $post = Post::factory()->create();
        $this->assertInstanceOf(User::class, $post->user);
    }

    public function test_post_has_correct_fillable() {
        $post = new Post();
        $this->assertEquals(['title', 'content', 'user_id', 'excerpt', 'category_id'], $post->getFillable());        
    }

    public function test_get_excerpt_truncates_long_text() {
        $service = new PostService;
        $result = $service->getExcerpt('Everybody niggers', 4);
        $this->assertEquals('Ever...', $result);
    }
}


