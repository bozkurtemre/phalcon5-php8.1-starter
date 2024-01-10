<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Encryption\Security;

class SecurityProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $di->set('security', function () use ($di) {
            $security = new Security();
            $security->setDI($di);

            return $security;
        });
    }
}
