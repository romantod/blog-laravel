<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пост</title>
</head>
<body>
    <h2>Пост с автором:</h2>          
    <h3>{{ $post->title }}</h3>
    <h4>{{ $post->content }}</h4>
    <h4>Автор: {{ $post->user->name }}</h4>
    <hr>
</body>
</html>