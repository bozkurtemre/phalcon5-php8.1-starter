<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Session\Adapter\Redis;
use Phalcon\Session\Manager;
use Phalcon\Storage\AdapterFactory;
use Phalcon\Storage\SerializerFactory;

class SessionProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $config = $di->getShared('config');

        $di->setShared('session', function () use ($config) {
            $session = new Manager();
            $serializerFactory = new SerializerFactory();
            $factory = new AdapterFactory($serializerFactory);
            $redis = new Redis($factory, [
                'host' => $config->redis->host,
                'port' => $config->redis->port,
                'lifetime' => $config->redis->indexes->session->lifetime,
                'prefix' => $config->redis->indexes->session->prefix,
                'index' => $config->redis->indexes->session->index,
            ]);
            $session->setAdapter($redis)->start();

            return $session;
        });
    }
}
