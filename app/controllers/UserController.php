<?php

require_once __DIR__ . '/../../core/View.php';
require_once __DIR__ . '/../models/Employee.php';
require_once __DIR__ . '/../models/Department.php';

class UserController
{
    private $employee;
    private $department;

    public function __construct()
    {
        $this->employee = new Employee();
        $this->department = new Department();
    }

    public function index()
    {
        $users = $this->employee->getAll();
        View::render('users/index', ['users' => $users]);
    }

    public function create()
    {
        $departments = $this->department->getAll();
        View::render('users/create', ['departments' => $departments]);
    }

    public function store()
    {
        $data = [
            'email' => trim($_POST['email'] ?? ''),
            'name' => trim($_POST['name'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'comments' => trim($_POST['comments'] ?? ''),
            'department_id' => intval($_POST['department_id'] ?? 0),
        ];

        // Простая валидация
        if (!$data['email'] || !$data['name']) {
            echo "Email и имя обязательны";
            return;
        }

        if ($this->employee->create($data)) {
            header('Location: /users');
            exit;
        } else {
            echo "Ошибка при добавлении сотрудника";
        }
    }

    public function show($id)
    {
        $user = $this->employee->getById($id);
        if (!$user) {
            http_response_code(404);
            echo "Сотрудник не найден";
            return;
        }
        View::render('users/show', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = $this->employee->getById($id);
        $departments = $this->department->getAll();

        if (!$user) {
            http_response_code(404);
            echo "Сотрудник не найден";
            return;
        }

        View::render('users/edit', ['user' => $user, 'departments' => $departments]);
    }

    public function update($id)
    {
        $data = [
            'email' => trim($_POST['email'] ?? ''),
            'name' => trim($_POST['name'] ?? ''),
            'address' => trim($_POST['address'] ?? ''),
            'phone' => trim($_POST['phone'] ?? ''),
            'comments' => trim($_POST['comments'] ?? ''),
            'department_id' => intval($_POST['department_id'] ?? 0),
        ];

        if (!$data['email'] || !$data['name']) {
            echo "Email и имя обязательны";
            return;
        }

        if ($this->employee->update($id, $data)) {
            header('Location: /users');
            exit;
        } else {
            echo "Ошибка при обновлении сотрудника";
        }
    }

    public function destroy()
    {
        $id = intval($_POST['id'] ?? 0);

        if ($id > 0 && $this->employee->delete($id)) {
            header('Location: /users');
            exit;
        } else {
            echo "Ошибка при удалении сотрудника";
        }
    }
}