<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Пост</title>
</head>
<body>       
    <div class="post-card">
        <strong>{{ $post->title }}</strong><br><br>
        @if ($post->excerpt)
                {{ $post->excerpt }}<br><br>
            @endif
        {{ $post->content }}<br><br>
        <small>Автор: {{ $post->user->name }}</small><br>
        <a href="/posts#post-{{ $post->id }}" class="btn btn-primary">Назад к постам</a>
        <a href="/users/{{ $post->user->id }}/posts" class="btn btn-primary">Все посты автора</a>
    </div>
</body>
</html>