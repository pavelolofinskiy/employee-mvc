<h1>Добавить нового сотрудника</h1>

<form action="/add-user" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email*</label>
        <input type="email" id="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Имя*</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Адрес</label>
        <textarea id="address" name="address" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Телефон</label>
        <input type="text" id="phone" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label for="comments" class="form-label">Комментарии</label>
        <textarea id="comments" name="comments" class="form-control"></textarea>
    </div>

    <div class="mb-3">
        <label for="department_id" class="form-label">Отдел</label>
        <select id="department_id" name="department_id" class="form-select">
            <option value="">-- не выбран --</option>
            <?php foreach ($departments as $department): ?>
                <option value="<?= htmlspecialchars($department['id']) ?>">
                    <?= htmlspecialchars($department['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Добавить сотрудника</button>
</form>