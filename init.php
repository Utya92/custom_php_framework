<?php

use core\Application;

//логика защиты скриптов от прямого вызова
if (!defined('JOIN_CORE')) define('JOIN_CORE', true);
//константа содержащая путь к шаблону  news
define("TEMPLATE_PATH", $_SERVER['DOCUMENT_ROOT'].'/FW/templates/');

//автолодер
spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

session_start();

$app= Application::getInstance();




