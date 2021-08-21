<?php
declare(strict_types=1);

use Slim\App;
use App\Core\Settings\SettingsInterface;
use Tuupola\Middleware\JwtAuthentication;

return function (App $app) use ($container) {

  // Parsing JSON Body Middleware
  $app->addBodyParsingMiddleware();
  
  // Routes middleware
  $app->addRoutingMiddleware();

  // Errors logs middlewares
  /** @var SettingsInterface $settings */
  $settings = $container->get(SettingsInterface::class);

  $displayErrorDetails = $settings->get('displayErrorDetails');
  $logError = $settings->get('logError');
  $logErrorDetails = $settings->get('logErrorDetails');

  $app->addErrorMiddleware($displayErrorDetails, $logError, $logErrorDetails);
    
  // Authentication Middleware
  $app->add(new JwtAuthentication([
      "path" => ["/api"],
      "ignore" => ['/api/login'],
      "secret" => $_ENV['SECRET_TOKEN']
  ]));
};
