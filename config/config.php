<?php

declare(strict_types=1);

use Phalcon\Config\Config;

$config['application'] = [
    'name' => env('APP_NAME', 'Phalcon'),
    'env' => env('APP_ENV', 'local'),
    'debug' => env('APP_DEBUG', false),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'url' => env('APP_URL', 'http://localhost'),
    'domain' => env('APP_DOMAIN', 'localhost'),
    'baseUri' => '/',
];

$config['directory'] = [
    'appDir' => APP_PATH . '/',
    'controllersDir' => APP_PATH . '/Controllers/',
    'constantsDir' => APP_PATH . '/Constants/',
    'modelsDir' => APP_PATH . '/Models/',
    'migrationsDir' => APP_PATH . '/Migrations/',
    'pluginsDir' => APP_PATH . '/Plugins/',
    'libraryDir' => BASE_PATH . '/library/',
    'viewsDir' => BASE_PATH . '/resources/views/',
    'cacheDir' => BASE_PATH . '/storage/cache/',
    'logsDir' => BASE_PATH . '/storage/logs/',
];

$config['mysql'] = [
    'host' => env('DB_HOST', 'localhost'),
    'port' => env('DB_PORT', 3306),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'dbname' => env('DB_NAME', 'phalcon'),
    'charset' => 'utf8mb4'
];

$config['redis'] = [
    'host' => env('REDIS_HOST', 'localhost'),
    'port' => env('REDIS_PORT', 6379),
    'indexes' => [
        'session' => [
            'index' => 0,
            'prefix' => 'session_',
            'lifetime' => 3600,
        ],
        'cache' => [
            'index' => 1,
            'prefix' => 'cache_',
            'lifetime' => 86400,
            'defaultSerializer' => 'Php',
        ],
    ],
];

return new Config($config);
