<h1>Детали сотрудника</h1>

<table class="table">
    <tr><th>ID</th><td><?= htmlspecialchars($user['id']) ?></td></tr>
    <tr><th>Email</th><td><?= htmlspecialchars($user['email']) ?></td></tr>
    <tr><th>Имя</th><td><?= htmlspecialchars($user['name']) ?></td></tr>
    <tr><th>Адрес</th><td><?= nl2br(htmlspecialchars($user['address'])) ?></td></tr>
    <tr><th>Телефон</th><td><?= htmlspecialchars($user['phone']) ?></td></tr>
    <tr><th>Комментарии</th><td><?= nl2br(htmlspecialchars($user['comments'])) ?></td></tr>
    <tr><th>Отдел</th><td><?= htmlspecialchars($user['department_name'] ?? '-') ?></td></tr>
</table>

<a href="/users" class="btn btn-secondary">Назад к списку</a>