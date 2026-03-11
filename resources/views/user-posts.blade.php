<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Посты пользователя</title>
</head>
<body>
    <h2>Посты пользователя: {{ $user->name }}</h2>
    @foreach ($posts as $post)
            {{ $user->name }} - {{ $user->email }}
            <h3>{{ $post->title }}</h3>
            <h4>{{ $post->content }}</h4>
            <small>Создан: {{ $post->created_at }}</small>
            <hr>
    @endforeach
</body>
</html>