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
        <h3>
            <label>Заголовок:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </h3>
        <h3>
            <label>Содержание:</label>
            <textarea name="content" id="content" required>{{ old('content') }}</textarea>
        </h3>
        <h2>
            <label>Автор:</label>
            <select name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </h2>
        <button type="submit" class="btn btn-success">Создать</button>
    </form>
</body>
</html>