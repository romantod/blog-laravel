<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Посты</title>
</head>
<body>
    <nav class="nav">
        <a href="/posts" class="{{ request()->is('posts*') ? 'nav-active' : '' }}">Посты</a>
        <a href="/users" class="{{ request()->is('users*') ? 'nav-active' : '' }}">Пользователи</a>
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
    <form method="GET" action="/posts">
        <input type="text" name="search" value="{{ request('search') }}">
        <select name="user_id">
            <option value="">Все авторы</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : ''}}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <select name="sort">
            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>По дате</option>
            <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>По заголовку</option>
        </select>

        <button type="submit" class="btn btn-primary">Найти</button>

        {{-- Кнопка сброса — показывается только если активен поиск ИЛИ выбран автор --}}
        @if (request('search') || (request('user_id')))
            <a href="/posts" class="btn btn-danger">Сбросить</a>
        @endif

    </form>

    <h1>Все посты</h1>

    <div style="margin-bottom: 20px;">
        <a href="/posts/create" class="btn btn-success">Создать пост</a>
    </div>

    @if (request('search') || request('user_id'))
        @php
            $count = $posts->count();
            if ($count % 100 >= 11 && $count % 100 <= 19) {
                $word = 'постов';
            } elseif ($count % 10 == 1) {
                $word = 'пост';
            } elseif ($count % 10 >= 2 && $count % 10 <= 4) {
                $word = 'поста';
            } else {
                $word = 'постов';
            }
        @endphp
        
        Найдено: {{ $count }} {{ $word }}
    @endif

    {{-- forelse — как foreach, но с блоком @empty если коллекция пустая --}}
    @forelse ($posts as $post)
        <div class="post-card" id="post-{{ $post->id }}">
            <strong>{{ $post->title }}</strong><br><br>

            {{-- Показываем excerpt только если он есть --}}
            @if ($post->excerpt)
                {{ $post->excerpt }}<br><br>
            @endif

            <small>Автор: {{ $post->user->name }}</small><br>
            <a href="/posts/{{ $post->id }}" class="btn btn-primary">Просмотр</a>
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-warning">Редактировать</a>

            <form method="POST" action="/posts/{{ $post->id }}" style="display: inline;" onsubmit="return confirm('Вы уверены?')">
                @csrf
                @method ("DELETE")
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    {{-- Срабатывает когда $posts пустой --}}
    @empty
        @if (request('search') || request('user_id'))
            <p>По запросу ничего не найдено</p>
        @else
            <p>Постов пока нет</p>
        @endif
    @endforelse
</body>
</html>