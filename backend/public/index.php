<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

const BASE_PATH = __DIR__ . '/../';


require(BASE_PATH . 'Core/functions.php');

require base_path('Core/Response.php');
require base_path('Core/Database.php');

require base_path('Core/router.php');

