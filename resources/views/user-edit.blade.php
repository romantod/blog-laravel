<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать пользователя</title>
</head>
<body>
    <h2>Редактировать: {{ $user->name }}</h2>
    <form method="POST" action="/users/{{ $user->id }}">
        @csrf
        @method('PUT')
        <h3>
            <label>Имя:</label>
            <input type="text" name="name" value="{{ $user->name }}" required>
        </h3>
        <h3>
            <label>Email:</label>
            <input type="email" name="email" value="{{ $user->email }}" required>
        </h3>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>