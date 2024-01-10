<?php

declare(strict_types=1);

use Dotenv\Dotenv;

/**
 * Load ENV variables
 */
Dotenv::createImmutable(__DIR__)->load();

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => env('APP_ENV', 'local'),
        env('APP_ENV', 'local') => [
            'adapter' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'name' => env('DB_NAME', 'phalcon'),
            'user' => env('DB_USER', 'root'),
            'pass' => env('DB_PASS', ''),
            'port' => env('DB_PORT', '3306'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci'
        ]
    ],
    'version_order' => 'creation'
];
