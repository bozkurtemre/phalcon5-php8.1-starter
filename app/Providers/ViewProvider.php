<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt;

class ViewProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $di->set('view', function () use ($di) {
            $view = new View();
            $view->setViewsDir(BASE_PATH . '/resources/views/');
            $view->registerEngines([
                '.volt' => function () use ($view, $di) {
                    $volt = new Volt($view, $di);
                    $volt->setOptions([
                        'always' => (bool)env('APP_DEBUG', false),
                        'extension' => '.php',
                        'separator' => '_',
                        'stat' => true,
                        'path' => BASE_PATH . '/storage/cache/volt/',
                        'prefix' => env('APP_ENV', 'local'),
                    ]);

                    return $volt;
                }
            ]);

            return $view;
        });
    }
}
