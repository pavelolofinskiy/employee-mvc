<h1>Отделы</h1>

<form action="/departments" method="POST" class="mb-4">
    <div class="mb-3">
        <label for="name" class="form-label">Название отдела</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <button class="btn btn-success" type="submit">Добавить отдел</button>
</form>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Действия</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($departments as $department): ?>
        <tr>
            <td><?= htmlspecialchars($department['id']) ?></td>
            <td><?= htmlspecialchars($department['name']) ?></td>
            <td>
                <form action="/departments/delete" method="POST" style="display:inline-block;" onsubmit="return confirm('Удалить отдел?');">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($department['id']) ?>">
                    <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>