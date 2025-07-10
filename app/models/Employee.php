<?php

require_once __DIR__ . '/../../core/Database.php';

class Employee
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function create($data)
    {
        $sql = "INSERT INTO employees (email, name, address, phone, comments, department_id) 
                VALUES (:email, :name, :address, :phone, :comments, :department_id)";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':email' => $data['email'],
            ':name' => $data['name'],
            ':address' => $data['address'],
            ':phone' => $data['phone'],
            ':comments' => $data['comments'],
            ':department_id' => $data['department_id'] ?: null,
        ]);
    }

    public function getAll()
    {
        $sql = "SELECT e.*, d.name AS department_name 
                FROM employees e 
                LEFT JOIN departments d ON e.department_id = d.id
                ORDER BY e.name";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT e.*, d.name AS department_name 
                FROM employees e 
                LEFT JOIN departments d ON e.department_id = d.id
                WHERE e.id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE employees SET email = :email, name = :name, address = :address, phone = :phone, comments = :comments, department_id = :department_id WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':email' => $data['email'],
            ':name' => $data['name'],
            ':address' => $data['address'],
            ':phone' => $data['phone'],
            ':comments' => $data['comments'],
            ':department_id' => $data['department_id'] ?: null,
            ':id' => $id,
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM employees WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}