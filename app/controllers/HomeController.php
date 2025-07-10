<?php

class HomeController
{
    public function index()
    {
        echo "<h1>Добро пожаловать!</h1><p><a href='/users'>Список сотрудников</a></p>";
    }
}