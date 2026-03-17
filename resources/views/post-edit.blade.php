@php
    /** @var \App\Models\Post $post */
@endphp

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

        <label>Категория:</label>
        <select name="category_id">
            <option value="">Без категории</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : ''}}>
                    {{ $category->name }}
                </option>         
            @endforeach

        </select>   
        
        <label>Заголовок:</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>

        <label>Краткое описание:</label>
        <textarea name="excerpt" id="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea> 

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
        
        <a href="/posts#post-{{ $post->id }}" class="btn btn-primary">Отмена</a>
        <button type="submit" class="btn btn-success">Сохранить</button><br>
    </form>
</body>
</html>