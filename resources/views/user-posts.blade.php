<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Посты пользователя</title>
</head>
<body>
    <h1>Посты пользователя: {{ $user->name }}</h1>
    @foreach ($posts as $post)
    <div class="post-card">
        <h3>{{ $post->title }}</h3>
        <h4>{{ $post->content }}</h4>
        <small>Создан: {{ $post->created_at }}</small><br>
    </div>
    @endforeach
    <a href="/users#user-{{ $user->id }}" class="btn btn-primary">Назад к пользователям</a>
    <a href="/posts#post-{{ $post->id }}" class="btn btn-primary">Назад к постам</a><br><br>
</body>
</html>