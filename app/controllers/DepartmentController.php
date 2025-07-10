<?php

require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../models/Department.php';

class DepartmentController
{
    private $department;

    public function __construct()
    {
        $this->department = new Department();
    }

    public function index()
    {
        $departments = $this->department->getAll();
        View::render('departments/index', ['departments' => $departments]);
    }

    public function store()
    {
        $name = trim($_POST['name'] ?? '');

        if ($name === '') {
            echo "Название отдела не может быть пустым";
            return;
        }

        if ($this->department->create($name)) {
            header('Location: /departments');
        } else {
            echo "Ошибка при добавлении отдела";
        }
    }

    public function destroy()
    {
        $id = intval($_POST['id'] ?? 0);

        if ($id > 0 && $this->department->delete($id)) {
            header('Location: /departments');
        } else {
            echo "Ошибка при удалении отдела";
        }
    }
}