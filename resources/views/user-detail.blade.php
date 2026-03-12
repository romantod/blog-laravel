<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователь</title>
</head>
<body>
    <h2>{{ $user->name }}</h2>
    <h3>Email: {{ $user->email }}</h3>
    <p>Создан: {{ $user->created_at }}</p>
    <a href="/users">Назад к списку</a>
</body>
</html>