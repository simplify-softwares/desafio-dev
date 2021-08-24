<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use App\Repositories\UserRepository;
use App\Repositories\TransactionRepository;
use App\Repositories\TransactionTypeRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\Interfaces\TransactionTypeRepositoryInterface;
use App\Repositories\StoreRepository;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserRepositoryInterface::class => \DI\autowire(UserRepository::class),
        TransactionRepositoryInterface::class => \DI\autowire(TransactionRepository::class),
        TransactionTypeRepositoryInterface::class => \DI\autowire(TransactionTypeRepository::class),
        StoreRepositoryInterface::class => \DI\autowire(StoreRepository::class),
    ]);
};