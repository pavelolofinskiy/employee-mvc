<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Сотрудники</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
    <nav class="mb-4">
        <a href="/" class="btn btn-primary">Главная</a>
        <a href="/users" class="btn btn-outline-primary">Сотрудники</a>
        <a href="/add-user" class="btn btn-outline-primary">Добавить сотрудника</a>
        <a href="/departments" class="btn btn-outline-primary">Отделы</a>
    </nav>

    <?= $content ?>
</div>
</body>
</html>