<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Tests\TestCase; // базовый класс Laravel для тестов, он даёт методы $this->get(), $this->post(), $this->actingAs() и все остальные. Без него это был бы просто PHP класс без тестовых возможностей
use Illuminate\Foundation\Testing\RefreshDatabase; // трейт, который будем подключать

    // Итого весь тест проверяет одну вещь: пользователь отправил форму → данные прошли валидацию → запись появилась в БД → произошёл редирект. Все четыре шага покрыты одним тестом.

class PostTest extends TestCase { // Класс теста наследуется от TestCase. Это даёт доступ ко всем HTTP методам и assert методам. Это [MVC] — тест работает на уровне всего стека, от HTTP до модели
    use RefreshDatabase; // Трейт подключается внутри класса. Перед каждым тестовым методом Laravel автоматически накатывает все миграции в SQLite в памяти и очищает БД. Это гарантирует что каждый тест начинается с чистого листа и не зависит от других тестов

    public function test_posts_page_loads() {
        return $this->get('/posts')->assertStatus(200);
    }

    public function test_post_can_be_created() {
        $user = User::factory()->create(); // генерирует случайные name, email, password через Faker и создаёт запись в тестовой БД. Возвращает объект User с реальным id. Этот id нам нужен потому что пост требует существующего user_id — внешний ключ
        $this->actingAs($user); // говорит Laravel: "считай что этот пользователь авторизован". Без этого запрос идёт как гость. Если на маршруте стоит auth middleware — гость получит редирект на логин, а не на /posts. Тест упадёт по неправильной причине
        $this->post('/posts', ['title' => 'Мой заголовок', 'content' => 'Мой контент', 'user_id' => $user->id])->assertRedirect('/posts'); // Симулирует отправку формы. Laravel прогоняет запрос через роутер → PostController@store → валидацию → Post::create() → redirect('/posts'). assertRedirect('/posts') проверяет что контроллер вернул именно редирект на /posts, а не ошибку или другую страниц. assertDatabaseHa - Это уже не HTTP проверка — это прямая проверка БД. Laravel смотрит в тестовую SQLite БД и ищет запись с такими полями. Если запись есть — тест прошёл. Это финальное подтверждение что данные реально сохранились, а не просто редирект произошёл.
        $this->assertDatabaseHas('posts', ['title' => 'Мой заголовок', 'content' => 'Мой контент', 'user_id' => $user->id]); // assertDatabaseMissing и assertDatabaseHas принимают ассоциативный массив где ключ — это название колонки в таблице, значение — что искать
    }

    public function test_post_requires_title() {
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->post('/posts', ['title' => '', 'content' => 'Мой контент', 'user_id' => $user->id])
        ->assertSessionHasErrors('title'); // проверяет что в сессии есть ошибка именно для поля title. Laravel при провале валидации кладёт ошибки в сессию и делает редирект назад

    }

    public function test_post_can_be_deleted() {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create(['user_id' => $user->id]);
        $this->delete('/posts/' . $post->id)->assertRedirect('/posts');
        $this->assertDatabaseMissing('posts', ['id' => $post->id]); // assertDatabaseMissing и assertDatabaseHas принимают ассоциативный массив где ключ — это название колонки в таблице, значение — что искать
    }

    public function test_post_can_be_updated() {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create(['title' => 'Мой заголовок', 'content' => 'Мой контент', 'user_id' => $user->id]);
        $this->put("/posts/$post->id", ['title' => 'Новый заголовок', 'content' => 'Мой контент', 'user_id' => $user->id]);
        $this->assertDatabaseHas('posts', ['title' => 'Новый заголовок', 'content' => 'Мой контент', 'user_id' => $user->id]);
    }

    public function test_guest_cannot_create_post() {
        $this->post('/posts', ['title' => 'Мой заголовок', 'content' => 'Мой контент'])->assertRedirect('/login');
    }

    public function test_post_show_page_loads() {
        $user = User::factory()->create();
        $this->actingAs($user);
        $post = Post::factory()->create();
        $this->get('/posts/' . $post->id)->assertStatus(200);
    }
}