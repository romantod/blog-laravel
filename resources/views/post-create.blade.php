<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Создать пост</title>
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
    <h2>Создать пост</h2>
    <form method="POST" action="/posts">
        @csrf                
        <label>Заголовок:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>    
    
        <label>Краткое описание:</label>
        <textarea name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>

        <label>Содержание:</label>
        <textarea name="content" id="content" required>{{ old('content') }}</textarea>    
    
        <label>Автор:</label>
        <select name="user_id" required>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : ''}}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>        
        <a href="/posts" class="btn btn-primary">Отмена</a>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
</body>
</html>