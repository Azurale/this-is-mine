<?php

/** @var \Slim\App $app */
$container = $app->getContainer();


// Register component on container
$container['view'] = function ($container) {
    $dir = dirname(__DIR__);
    $view = new \Slim\Views\Twig($dir."/App/Views/", [
        'cache' => false, //$dir . "/data/cache",
        'debug' => true,
    ]);

    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));
    $view->addExtension(new Twig_Extension_Debug());


    $twig = $view->getEnvironment();

    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) {
        // implement whatever logic you need to determine the asset path
    
        return sprintf('/AdminLTE/%s', ltrim($asset, '/'));
    }));

    return $view;
};
