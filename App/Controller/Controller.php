<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Views\Twig;


class Controller
{
    /**
     *
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var Twig
     */
    private $view;


    /**
     * Controller constructor.
     * @param ContainerInterface $container
     * @param Twig $view
     */
    public function __construct(ContainerInterface $container, Twig $view)
    {
        $this->container = $container;
        $this->view = $view;
    }

    public function render(ResponseInterface $response, string $file, $data)
    {
        $this->view->render($response, $file, $data);
    }

}
