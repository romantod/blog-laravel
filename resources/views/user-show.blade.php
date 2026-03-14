<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Пользователь</title>
</head>
<body>
    <h2>{{ $user->name }}</h2>
    @if ($user->bio)
        О себе: {{ $user->bio }}<br>
    @endif
    <h3>Email: {{ $user->email }}</h3>
    <p>Создан: {{ $user->created_at }}</p>
    <a href="/users#user-{{ $user->id }}" class="btn btn-primary">Назад к списку</a>
</body>
</html>