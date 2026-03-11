<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Посты</title>
</head>
<body>
    <h1>Все посты:</h1>
    @foreach ($posts as $post)
        <h2>Заголовок: {{ $post->title }}</h2>
        <h3>Содержание: {{ $post->content }}</h3>
        <h3>Автор: {{ $post->user->name }}</h3>
        <form method="POST" action="/posts/{{ $post->id }}" style="display: inline;">
            @csrf
            @method ("DELETE")
            <button type="submit">Удалить</button>
        </form>
        <hr>
    @endforeach
</body>
</html>