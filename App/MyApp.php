<?php
/**
 * Created by PhpStorm.
 * User: Mathieu
 * Date: 06/10/2017
 * Time: 22:07
 */

namespace App;


use DI\Bridge\Slim\App;
use DI\ContainerBuilder;

class MyApp extends App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        $settings = require dirname(__DIR__). '/config/settings.php';

        $builder->addDefinitions($settings);
    }
}