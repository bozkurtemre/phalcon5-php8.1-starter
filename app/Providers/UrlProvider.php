<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\Url;

class UrlProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $config = $di->getShared('config');

        $di->setShared('url', function () use ($config) {
            $url = new Url();
            $url->setBaseUri($config->application->baseUri);

            return $url;
        });
    }
}
