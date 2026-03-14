<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Создать пользователя</title>
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
    <h1>Создать пользователя</h1>
    <form method="POST" action="/users">
        @csrf        
        <label>Имя:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>   
        
        <label>О себе:</label>
        <textarea name="bio" id="bio">{{ old('bio') }}</textarea>
    
        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>    
    
        <label>Пароль:</label>
        <input type="password" name="password" autocomplete="new-password" required>

        <label>Подтвердите пароль</label>
        <input type="password" name="password_confirmation" required>
        
        <a href="/users" class="btn btn-primary">Отмена</a>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
</body>
</html>