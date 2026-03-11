<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактировать пост</title>
</head>
<body>
    <h2>Редактировать: {{ $post->title }}</h2>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        <h3>
            <label>Заголовок:</label>
            <input type="text" name="title" value="{{ $post->title }}" required>
        </h3>
        <h3>
            <label>Содержание:</label>
            <textarea name="content" required>{{ $post->content }}</textarea>
        </h3>
        <h2>
            <label>Автор:</label>
            <select name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }} >
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </h2>
        <button type="submit">Сохранить</button>
    </form>
</body>
</html>