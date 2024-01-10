<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Phalcon\Autoload\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Application;

define('BASE_PATH', dirname(__DIR__));
const APP_PATH = BASE_PATH . '/app';

try {
    /**
     * Init Loader
     */
    $loader = new Loader();

    $loader->setFiles([
        BASE_PATH . '/vendor/autoload.php'
    ]);

    $loader->register();

    /**
     * Load ENV variables
     */
    Dotenv::createImmutable(BASE_PATH)->load();

    /**
     * Init Dependency Injection
     */
    $container = new FactoryDefault();

    /**
     * Init Application
     */
    $application = new Application($container);

    /**
     * Register Service Providers
     */
    $providers = BASE_PATH . '/config/providers.php';
    if (!file_exists($providers) || !is_readable($providers)) {
        throw new Exception('Provider file does not exist: ' . $providers);
    }

    /** @var array $providers */
    $providers = include_once $providers;
    foreach ($providers as $provider) {
        $container->register(new $provider());
    }

    /**
     * Handle the request
     */
    $application->handle($_SERVER["REQUEST_URI"])->send();
} catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
