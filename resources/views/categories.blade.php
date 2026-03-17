<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Категории</title>
</head>
<body>
    <nav class="nav">
        <a href="/posts" class="{{ request()->is('posts*') ? 'nav-active' : '' }}">Посты</a>
        <a href="/users" class="{{ request()->is('users*') ? 'nav-active' : '' }}">Пользователи</a>
        <a href="/categories" class="{{ request()->is('categories*') ? 'nav-active' : '' }}">Категории</a>
    </nav>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif

    <h1>Все категории</h1>

    <div style="margin-bottom: 20px;">
        <a href="/categories/create" class="btn btn-success">Создать категорию</a>
    </div>

    @forelse ($categories as $category)
        <div class="post-card" id="{{ $category->id }}">
            <strong>{{ $category->name }}</strong><br><br>

            {{-- Показываем description только если он есть --}}
            @if ($category->description)
                {{ $category->description }}<br><br>
            @endif

            <a href="/categories/{{ $category->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/categories/{{ $category->id }}/edit" class="btn btn-warning">Редактировать</a>

            <form method="POST" action="/categories/{{ $category->id }}" style="display: inline;" onsubmit="return confirm('Вы уверены?')">
                @csrf
                @method ("DELETE")
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    
    @empty
        <p>Категорий пока нет</p>
    @endforelse
</body>
</html>