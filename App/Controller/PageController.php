<?php

namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 *
 */
class PageController extends Controller
{
    public function home(Request $request, Response $response, $args =[])
    {
        $this->render($response, 'pages'.S.'home.twig', ['name' => 'Marc']);
    }
}
