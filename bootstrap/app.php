<?php declare(strict_types=1);

require_once __DIR__ . '\..\vendor\autoload.php';

$container = new \League\Container\Container;

$container->delegate(new \League\Container\ReflectionContainer); // active auto wiring
$container->addServiceProvider(\App\Providers\AppServiceProvider::class);
$container->addServiceProvider(\App\Providers\ViewServiceProvider::class);
$container->addServiceProvider(\App\Providers\DatabaseServiceProvider::class);

$strategy = (new \League\Route\Strategy\ApplicationStrategy)->setContainer($container);
$router   = $container->get(\League\Route\Router::class)->setStrategy($strategy);

// map a route
require_once __DIR__ . '\..\routes\web.php';

$response = $router->dispatch($container->get('request'));
