<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserRepositoryInterface::class => \DI\autowire(UserRepository::class),
    ]);
};