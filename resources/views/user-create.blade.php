<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать пользователя</title>
</head>
<body>
    <h2>Создать пользователя</h2>
    <form method="POST" action="/users">
        @csrf
        <h3>
            <label>Имя:</label>
            <input type="text" name="name" required>
        </h3>
        <h3>
            <label>Email:</label>
            <input type="email" name="email" required>
        </h3>
        <h3>
            <label>Пароль:</label>
            <input type="password" name="password" required>
        </h3>
        <button type="submit">Создать</button>
    </form>
</body>
</html>