<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Редактировать пост</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2>Редактировать: {{ $post->title }}</h2>
    <form method="POST" action="/posts/{{ $post->id }}">
        @csrf
        @method('PUT')
        
        <label>Заголовок:</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
            
        <label>Содержание:</label>
        <textarea name="content" required>{{ old('content', $post->content) }}</textarea>
            
        <label>Автор:</label>
        <select name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id', $post->user_id) == $user->id ? 'selected' : '' }} >
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        
        <button type="submit" class="btn btn-success">Сохранить</button><br>
        <a href="/posts" class="btn btn-primary">Отмена</a>
    </form>
</body>
</html>