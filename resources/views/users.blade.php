<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Пользователи</title>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Все пользователи</h1>
    <div style="margin-bottom: 20px;">
        <a href="/users/create" class="btn btn-success">Создать пользователя</a>
    </div>
    @foreach ($users as $user)
        <div class="post-card" id="user-{{ $user->id }}">
            <strong>{{ $user->name }}</strong><br><br>
            {{ $user->email }}<br><br>
            @if ($user->bio)
                О себе: {{ $user->bio }}<br><br>
            @endif
            Постов: {{ $user->posts->count() }}<br><br>
            <a href="/users/{{ $user->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/users/{{ $user->id }}/edit" class="btn btn-warning">Редактировать</a>
            <form method="POST" action="/users/{{ $user->id }}" style="display:inline" onsubmit="return confirm('Вы уверены?')">
                @csrf
                @method("DELETE")
                <!-- @method("DELETE") преобразовывает POST в DELETE -->
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    @endforeach
</body>
</html>