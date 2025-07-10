<?php

class View
{
    public static function render($view, $data = [])
    {
        $viewFile = __DIR__ . '/../app/views/' . $view . '.php';

        if (file_exists($viewFile)) {
            extract($data);
            ob_start();
            include $viewFile;
            $content = ob_get_clean();
            include __DIR__ . '/../app/views/layout.php';
        } else {
            echo "View '$view' not found.";
        }
    }
}