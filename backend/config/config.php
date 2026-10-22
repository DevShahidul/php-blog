<?php

$envFile = __DIR__ . '/../.env';

if(!is_readable($envFile)){
    throw new RuntimeException("The .env file is missing or not readable.");
}

$env = parse_ini_file($envFile, false, INI_SCANNER_RAW);

if ($env === false) {
    throw new RuntimeException("Failed to parse the .env file.");
}

foreach ($env as $key => $value) {
    putenv("$key=$value");
    $_ENV[$key] = $value;
}


return [
    'database' => [
        'host' => 'localhost',
        'port' => '5432',
        'dbname' => 'php_blog',
    ],
];