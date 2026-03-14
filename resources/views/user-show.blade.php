<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Пользователь</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2>Имя: {{ $user->name }}</h2>
    <h3>Email: {{ $user->email }}</h3>
    @if ($user->bio)
        О себе: {{ $user->bio }}<br><br>
    @endif
    Постов: {{ $user->posts->count() }}
    <a href="/users/{{ $user->id }}/posts" class="btn btn-warning">Все посты автора</a>
    <p>Создан: {{ $user->created_at }}</p>
    <a href="/users#user-{{ $user->id }}" class="btn btn-primary">Назад к списку</a>
</body>
</html>