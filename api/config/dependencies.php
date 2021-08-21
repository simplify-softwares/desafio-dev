<?php
declare(strict_types=1);

use App\Core\Entity\EntityManager;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        'db' => function() {
            $settings = require __DIR__ . "/../phinx.php";
            $env = $settings['environments']['default_environment'];
            $params = $settings['environments'][$env];
        
            $db = adoNewConnection($params['adapter']);
            $db->connect($params['host'], $params['user'], $params['pass'], $params['name']);
            $db->Execute('SET NAMES utf8');
        
            return $db;
        },
        'em' => function (ContainerInterface $container) {
            return new EntityManager($container->get('db'));
        }
    ]);
};
