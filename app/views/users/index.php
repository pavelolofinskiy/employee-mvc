<h1>Сотрудники</h1>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Имя</th>
        <th>Отдел</th>
        <th>Детали</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['department_name'] ?? '-') ?></td>
            <td><a href="/user/<?= $user['id'] ?>" class="btn btn-sm btn-info">Просмотр</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>