<?php

namespace App\Providers;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use League\Container\ServiceProvider\AbstractServiceProvider;

class DatabaseServiceProvider extends AbstractServiceProvider
{

    protected $provides = [
        EntityManager::class
    ];

    public function register()
    {
        $container = $this->getContainer();

        $container->share(EntityManager::class, function () {
            // Create a simple "default" Doctrine ORM configuration for Annotations
            $isDevMode = true;
            $proxyDir = null;
            $cache = null;
            $useSimpleAnnotationReader = false;
            $isDevMode = true;

            $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '\..\Models'), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

            // database configuration parameters
            $conn = array(
                'driver' => 'pdo_sqlite',
                'path' => __DIR__ . '/../../database/events.sqlite',
            );

            // obtaining the entity manager
            return EntityManager::create($conn, $config);
        });
    }
}
