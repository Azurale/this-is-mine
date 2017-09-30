<?php

namespace App\Controller;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 *
 */
class HomeController extends Controller
{
    public function home(Request $request, Response $response, $args =[])
    {
        $this->render($response, 'pages/home.twig', [
            'name' => 'This is home',
            'pageHeader' => 'Titre de la page',
        ]);
    }
}
