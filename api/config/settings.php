<?php
declare(strict_types=1);

use App\Core\Settings\Settings;
use App\Core\Settings\SettingsInterface;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => IS_DEV_ENV === true ? true : false,
                'logError'            => IS_DEV_ENV === true ? true : false,
                'logErrorDetails'     => IS_DEV_ENV === true ? true : false,
                'cnab' => [
                    'tipo' => ['start' => 1, 'length' => 1],
                    'data' => ['start' => 2, 'length' => 8],
                    'valor' => ['start' => 10, 'length' => 10],
                    'cpf' => ['start' => 20, 'length' => 11],
                    'cartao' => ['start' => 31, 'length' => 12],
                    'hora' => ['start' => 43, 'length' => 6],
                    'dono' => ['start' => 49, 'length' => 14],
                    'loja' => ['start' => 63, 'length' => 19],
                ]
            ]);
        }
    ]);
};