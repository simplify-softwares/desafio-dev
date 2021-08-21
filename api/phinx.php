<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ );
$dotenv->load();

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_environment' => 'development',

        'development' => [
            'adapter' => $_ENV['DB_ADAPTER'],
            'host' => $_ENV["DB_HOST"],
            'name' => $_ENV["DB_DATABASE"],
            'user' => $_ENV["DB_USERNAME"],
            'pass' => $_ENV["DB_PASSWORD"],
            'port' => $_ENV["DB_PORT"],
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'testing_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];