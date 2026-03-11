<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пользователи</title>
</head>
<body>
    <h2>Список пользователей:</h2>
    @foreach ($users as $user)
        <h3>
            {{ $user->name }} - {{ $user->email }}
            <a href="/users/{{ $user->id }}/edit">Редактировать</a>

            <form method="POST" action="/users/{{ $user->id }}" style="display:inline">
                @csrf
                @method("DELETE")
                <!-- @method("DELETE") преобразовывает POST в DELETE -->
                <button type="submit">Удалить</button>
            </form>
        </h3>
    @endforeach
</body>
</html>