<?php

declare(strict_types=1);

namespace App\Providers;

use Exception;
use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

/**
 * Config Provider
 */
class ConfigProvider implements ServiceProviderInterface
{
    /**
     * @param DiInterface $di
     * @throws Exception
     */
    public function register(DiInterface $di): void
    {
        $configPath = BASE_PATH . '/config/config.php';
        if (!file_exists($configPath) || !is_readable($configPath)) {
            throw new Exception('Config file does not exist: ' . $configPath);
        }

        $di->setShared('config', function () use ($configPath) {
            return require_once $configPath;
        });
    }
}
