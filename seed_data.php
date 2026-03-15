<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use App\Models\Post;

$users = [
    ['name' => 'Алексей Петров', 'email' => 'alexey@mail.com', 'password' => bcrypt('password123'), 'bio' => 'Разработчик PHP и Laravel'],
    ['name' => 'Мария Иванова', 'email' => 'maria@mail.com', 'password' => bcrypt('password123'), 'bio' => 'Фронтенд разработчик'],
    ['name' => 'Дмитрий Сидоров', 'email' => 'dmitry@mail.com', 'password' => bcrypt('password123'), 'bio' => 'Fullstack разработчик'],
    ['name' => 'Елена Козлова', 'email' => 'elena@mail.com', 'password' => bcrypt('password123'), 'bio' => 'UI/UX дизайнер'],
    ['name' => 'Сергей Новиков', 'email' => 'sergey@mail.com', 'password' => bcrypt('password123'), 'bio' => 'DevOps инженер'],
];

$posts = [
    ['title' => 'Введение в Laravel', 'content' => 'Laravel — это PHP фреймворк для веб-разработки с красивым синтаксисом.', 'excerpt' => 'Знакомство с Laravel'],
    ['title' => 'Eloquent ORM', 'content' => 'Eloquent — это ORM встроенный в Laravel для работы с базой данных.', 'excerpt' => 'Работа с базой данных'],
    ['title' => 'Blade шаблоны', 'content' => 'Blade — это простой но мощный шаблонизатор Laravel.', 'excerpt' => 'Шаблонизатор Laravel'],
    ['title' => 'Миграции базы данных', 'content' => 'Миграции позволяют управлять структурой базы данных через код.', 'excerpt' => 'Управление БД'],
    ['title' => 'Маршрутизация в Laravel', 'content' => 'Маршруты определяют как приложение отвечает на HTTP запросы.', 'excerpt' => 'HTTP маршруты'],
    ['title' => 'Валидация форм', 'content' => 'Laravel предоставляет удобные инструменты для валидации входящих данных.', 'excerpt' => 'Проверка данных'],
    ['title' => 'Middleware', 'content' => 'Middleware фильтрует HTTP запросы входящие в приложение.', 'excerpt' => 'Фильтрация запросов'],
    ['title' => 'Аутентификация', 'content' => 'Laravel Breeze предоставляет готовую систему аутентификации.', 'excerpt' => 'Вход и регистрация'],
    ['title' => 'Загрузка файлов', 'content' => 'Laravel упрощает загрузку и хранение файлов на сервере.', 'excerpt' => 'Работа с файлами'],
    ['title' => 'Очереди задач', 'content' => 'Очереди позволяют откладывать выполнение тяжёлых задач на потом.', 'excerpt' => 'Фоновые задачи'],
];

foreach ($users as $userData) {
    $user = User::create($userData);
    $count = rand(1, 3);
    for ($i = 0; $i < $count; $i++) {
        $post = $posts[array_rand($posts)];
        Post::create([
            'title' => $post['title'] . ' — ' . $user->name,
            'content' => $post['content'],
            'excerpt' => $post['excerpt'],
            'user_id' => $user->id,
        ]);
    }
    echo "Создан: {$user->name} с {$count} постами\n";
}

echo "Готово!\n";
