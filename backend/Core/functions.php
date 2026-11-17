<?php

require base_path ('/config/config.php');



function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function getHostUri(): string {
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    return $scheme . '://' . $host;
};

function authorize($condition, $code = Response::FORBIDDEN) {
    if (!$condition) {
        abort($code);
    }

    return true;
}

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path, $attributes = []) {
    extract($attributes);

    require base_path("views/{$path}");
}