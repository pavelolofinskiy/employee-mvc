<?php

require_once __DIR__ . '/../../core/Database.php';

class Department
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM departments ORDER BY name");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name)
    {
        $stmt = $this->pdo->prepare("INSERT INTO departments (name) VALUES (:name)");
        return $stmt->execute(['name' => $name]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM departments WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}