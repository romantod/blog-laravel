<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Пользователи</title>
</head>
<body>
    <h1>Все пользователи</h1>
    <a href="/users/create" class="btn btn-success">Создать пользователя</a>

    @foreach ($users as $user)
        <div class="post-card" id="user-{{ $user->id }}">
            <strong>{{ $user->name }}</strong><br><br>
            @if ($user->bio)
                О себе: {{ $user->bio }}<br><br>
            @endif
            {{ $user->email }}<br><br>
            <a href="/users/{{ $user->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/users/{{ $user->id }}/edit" class="btn btn-warning">Редактировать</a>
            <form method="POST" action="/users/{{ $user->id }}" style="display:inline">
                @csrf
                @method("DELETE")
                <!-- @method("DELETE") преобразовывает POST в DELETE -->
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    @endforeach
</body>
</html>