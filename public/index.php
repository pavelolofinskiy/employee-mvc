<?php

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../config/config.php';

// Роутинг
$router = new Router();

// Регистрируем маршруты
$router->get('/', 'HomeController@index');
$router->get('/users', 'UserController@index');
$router->get('/user/{id}', 'UserController@show');
$router->get('/add-user', 'UserController@create');
$router->post('/add-user', 'UserController@store');

$router->get('/departments', 'DepartmentController@index');
$router->post('/departments', 'DepartmentController@store');
$router->post('/departments/delete', 'DepartmentController@destroy');
$router->get('/test-db', 'TestController@db');

// Запускаем маршрутизатор
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);