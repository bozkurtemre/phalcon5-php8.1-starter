<?php

declare(strict_types=1);

namespace App\Providers;

use Exception;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

/**
 * Router Provider
 */
class RouterProvider implements ServiceProviderInterface
{
    /**
     * @param DiInterface $di
     * @throws Exception
     */
    public function register(DiInterface $di): void
    {
        $routerPath = BASE_PATH . '/config/routes.php';
        if (!file_exists($routerPath) || !is_readable($routerPath)) {
            throw new Exception('Router file does not exist: ' . $routerPath);
        }

        $di->set('router', function () use ($routerPath) {
            return require_once $routerPath;
        });
    }
}
