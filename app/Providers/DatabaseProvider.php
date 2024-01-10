<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

class DatabaseProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $config = $di->getShared('config');

        $di->setShared('db', function () use ($config) {
            return new Mysql($config->mysql->toArray());
        });
    }
}
