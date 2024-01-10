<?php

declare(strict_types=1);

namespace App\Providers;

use Phalcon\Cache\Adapter\Redis;
use Phalcon\Cache\Cache;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Storage\SerializerFactory;

/**
 * Model Cache Provider
 */
class CacheProvider implements ServiceProviderInterface
{
    public function register(DiInterface $di): void
    {
        $config = $di->getShared('config');

        $di->setShared('cache', function () use ($config) {
            $factory = new SerializerFactory();
            $redis = new Redis($factory, [
                'host' => $config->redis->host,
                'port' => $config->redis->port,
                'lifetime' => $config->redis->indexes->cache->lifetime,
                'prefix' => $config->redis->indexes->cache->prefix,
                'index' => $config->redis->indexes->cache->index,
            ]);

            return new Cache($redis);
        });
    }
}
