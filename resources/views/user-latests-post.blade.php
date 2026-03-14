<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Последние посты</title>
</head>
<body>
    <h1>Здесь будет 3 последних поста(=|.|+|.|=) {{ $user->name }}</h1>

    @if ($posts->count() > 0)
        @foreach ($posts as $post)
            <div class="card">
                <h2>{{ $post->title }}</h2>
                <p>{{ Str::limit($post->content, 100) }}</p>
                <small>Создан: {{ $post->created_at->format('d.m.Y H:i') }}</small>
            </div>
        @endforeach
    @else
        <p>У пользователя нет пока постов.</p>
    @endif

    <a href="/users/{{ $user->id }}">← Назад к пользователю</a>




</body>
</html>