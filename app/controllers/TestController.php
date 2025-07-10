<?php

require_once __DIR__ . '/../../core/Database.php';

class TestController
{
    public function db()
    {
        $pdo = Database::getInstance();

        $stmt = $pdo->query("SELECT NOW() as now");
        $row = $stmt->fetch();

        echo "Подключение к базе прошло успешно! Сейчас: " . $row['now'];
    }
}