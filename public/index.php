<?php

session_start();

require "../vendor/autoload.php";

// Instantiate the app
$settings = require '../config/settings.php';
$app = new \Slim\App($settings);

include "../config/container.php";
include "../config/define.php";


$app->any('/{name}',App\Controller\PageController::class.':home')->setName('test');
$app->any('/test/{name}',App\Controller\PageController::class.':home')->setName('test2');

$app->get('/', App\Controller\HomeController::class.':home')->setName('home');

$app->run();


