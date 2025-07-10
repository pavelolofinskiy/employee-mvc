<?php

require_once __DIR__ . '/../../core/View.php';

class HomeController
{
    public function index()
    {
        View::render('home/index');
    }
}