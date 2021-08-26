<?php
declare(strict_types=1);

use App\Http\Actions\Transactions\Retrieve;
use App\Http\Actions\Transactions\Upload;
use Slim\App;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Handlers\Strategies\RequestResponseArgs;
use App\Http\Actions\Users\{
    AllUsers,
    Login
};
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Exception\HttpNotFoundException;

return function (App $app) {

    $routeCollector = $app->getRouteCollector();
    $routeCollector->setDefaultInvocationStrategy(new RequestResponseArgs());

    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        return $response;
    });

    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->post('/login', Login::class);
        $group->post('/transaction', Upload::class);

        $group->get('/transaction', Retrieve::class);
        $group->get('/transaction/store/{store_id}', Retrieve::class);
    });
};
