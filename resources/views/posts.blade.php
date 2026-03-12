<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Посты</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif
    <h1>Все посты:</h1>
    <a href="/posts/create" class="btn btn-success">Создать пост</a>
    @foreach ($posts as $post)
        <div class="post-card">
            <strong>Заголовок: {{ $post->title }}</strong><br>
            Содержание: {{ $post->content }}<br><br>
            <small>Автор: {{ $post->user->name }}</small><br>
            <a href="/posts/{{ $post->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Редактировать</a>
            <form method="POST" action="/posts/{{ $post->id }}" style="display: inline;">
                @csrf
                @method ("DELETE")
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    @endforeach
</body>
</html>