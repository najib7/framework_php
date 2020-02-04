<?php declare(strict_types=1);

namespace App\Providers;

use League\Route\Router;
use Zend\Diactoros\ServerRequestFactory;
use Zend\HttpHandlerRunner\Emitter\SapiEmitter;
use League\Container\ServiceProvider\AbstractServiceProvider;

class AppServiceProvider extends AbstractServiceProvider {

    protected $provides = [
        Router::class,
        'request',
        'emitter',
    ];

    public function register()
    {
        $container = $this->getContainer();

        $container->share('request', function() {
            return ServerRequestFactory::fromGlobals(
                $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
            );
        });

        $container->share('emitter', SapiEmitter::class);
        $container->share(Router::class);
    }
}