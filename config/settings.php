<?php

use Psr\Container\ContainerInterface;


error_reporting(E_ALL);

return [
    'settings.responseChunkSize' => 4096,
    'settings.outputBuffering' => false,
    'settings.determineRouteBeforeAppMiddleware' => false,
    'settings.displayErrorDetails' => true,



    \Slim\Views\Twig::class => function (ContainerInterface $container) {
        $dir = dirname(__DIR__);
        $view = new \Slim\Views\Twig($dir."/App/Views/", [
            'cache' => false, //$dir . "/data/cache",
            'debug' => true,
        ]);

        // Instantiate and add Slim specific extension
        $basePath = rtrim(str_ireplace('index.php', '', $container->get('request')->getUri()->getBasePath()), '/');
        $view->addExtension(new Slim\Views\TwigExtension($container->get('router'), $basePath));
        $view->addExtension(new Twig_Extension_Debug());


        $twig = $view->getEnvironment();

        $twig->addFunction(new  \Twig_SimpleFunction('asset', function ($asset) {
            return sprintf('/AdminLTE/%s', ltrim($asset, '/'));
        }));

        return $view;
    },
];