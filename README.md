# Employee MVC Application

Простое MVC-приложение на PHP без фреймворков для управления сотрудниками и отделами.

---

## Описание

Приложение позволяет:

- Добавлять, редактировать, удалять сотрудников
- Просматривать список сотрудников с их отделами
- Просматривать подробную информацию о сотруднике
- Управлять отделами: добавлять, удалять, просматривать список
- Использовать ЧПУ-маршруты (например, `/users`, `/add-user`, `/departments`)

---

## Стек технологий

- PHP 7.4+ (требуется поддержка PDO)
- MySQL/MariaDB
- Bootstrap 5
- Apache/Nginx или встроенный PHP-сервер

---     

## Установка и запуск

1. Клонируйте репозиторий:

   ```bash
   git clone https://github.com/pavelolofinskiy/employee-mvc.git
   cd employee-mvc

2. Создайте базу данных MySQL:

    ```bash
    CREATE DATABASE employee_mvc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

3. Импортируйте таблицы (SQL находится в database/migrations/001_create_tables.sql):

    ```bash
    -- Таблица departments
    CREATE TABLE departments (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    -- Таблица employees
    CREATE TABLE employees (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        name VARCHAR(255) NOT NULL,
        address TEXT,
        phone VARCHAR(50),
        comments TEXT,
        department_id INT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL
    );

4. Настройте подключение к базе данных в config/config.php: 

    ```bash
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'employee_mvc');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_CHARSET', 'utf8mb4');

5. Запустите встроенный PHP-сервер из корня проекта:

    ```bash
    php -S localhost:8000 -t public

6. Откройте в браузере:

    ```bash 
    http://localhost:8000/