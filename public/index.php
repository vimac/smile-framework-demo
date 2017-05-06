<?php

ini_set('always_populate_raw_post_data', '-1');
ini_set('date.timezone', 'Asia/Shanghai');
error_reporting(0); //有点小问题, 暂时设置成0

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

$extensions = array('js', 'map');
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$ext = pathinfo($path, PATHINFO_EXTENSION);
if (in_array($ext, $extensions)) {
    return false;
}

require __DIR__ . '/../vendor/autoload.php';

$containerLoader = require __DIR__ . '/../resource/config/container.php';
$routerLoader = require __DIR__ . '/../resource/config/routes.php';

$app = new \Smile\Application($containerLoader);
$app->loadRouterConfig($routerLoader);


// Register routes

// Run app
$app->run();
