<?php

require_once "../vendor/autoload.php";

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

define('APP_ENV', $_ENV['ENV']);
define('IS_DEV_ENV', APP_ENV === 'development');

ini_set('display_errors', (IS_DEV_ENV === true ? 'On' : 'Off'));
error_reporting((IS_DEV_ENV === true ? E_ALL : 0));

$containerBuilder = new ContainerBuilder();

// Set up settings
$settings = require __DIR__ . '/../config/settings.php';
$settings($containerBuilder);

$dependencies = require __DIR__ . '/../config/dependencies.php';
$dependencies($containerBuilder);

$repositories = require __DIR__ . '/../config/repositories.php';
$repositories($containerBuilder);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

$middleware = require __DIR__ . '/../config/middlewares.php';
$middleware($app);

$routes = require __DIR__ . '/../config/routes.php';
$routes($app);

$app->run();