<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Редактировать пользователя</title>
</head>
<body>
    <h2>Редактировать: {{ $user->name }}</h2>
    <form method="POST" action="/users/{{ $user->id }}">
        @csrf
        @method('PUT')
        
        <label>Имя:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

        <label>О себе:</label>
        <textarea name="bio" id="bio">{{ old('bio', $user->bio) }}</textarea>    
    
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
    
        <button type="submit" class="btn btn-success">Сохранить</button>
        <a href="/users#user-{{ $user->id }}" class="btn btn-primary">Отмена</a>
    </form>
</body>
</html>