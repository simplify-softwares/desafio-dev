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
            ]);
        }
    ]);
};
