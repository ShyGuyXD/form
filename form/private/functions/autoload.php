<?php
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/classes/' . $class_name . '.php'; // Путь к вашим классам
    if (file_exists($file)) {
        require_once $file;
    }
});
?>