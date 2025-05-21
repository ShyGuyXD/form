<?php

use App\Kernel;
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
ini_set('error_reporting', E_ALL);


$loader = require_once __DIR__ . '/vendor/autoload.php';

$loader->addPsr4('Database\\', '/private/functions/classes/Database/');
$loader->addPsr4('Validator\\', '/private/functions/classes/Database/');


include 'index.html';
return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};



?>