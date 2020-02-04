<?php declare(strict_types=1);

namespace App\Providers;

use App\Views\View;
use League\Route\Router;
use League\Container\ServiceProvider\AbstractServiceProvider;

class ViewServiceProvider extends AbstractServiceProvider {

    protected $provides = [
        View::class,
    ];

    public function register()
    {
        $container = $this->getContainer();
        
        $container->share(View::class, function() use ($container) {
            $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '\..\..\resources\views');
            $twig = new \Twig\Environment($loader, [
                'cache' => false,
            ]);
            $function = new \Twig\TwigFunction('route', function($routeName) use ($container){
                return $container->get(Router::class)->getNamedRoute($routeName)->getPath();
            });
            $twig->addFunction($function);
            return new View($twig);
        });
    }
}