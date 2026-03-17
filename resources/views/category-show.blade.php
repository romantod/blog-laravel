<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Категория</title>
</head>
<body>       
    <div class="post-card">
        <strong>{{ $category->name }}</strong><br><br>

        @if ($category->description)
            {{ $category->description }}<br><br>
        @endif

        <a href="/categories" class="btn btn-primary">Назад к категориям</a>
    </div>
</body>
</html>