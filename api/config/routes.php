<?php
declare(strict_types=1);

use Slim\App;
use Slim\Handlers\Strategies\RequestResponseArgs;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Http\Actions\Transactions\{
    Retrieve as TransactionRetrieve,
    Upload
};
use App\Http\Actions\Users\Login;
use App\Http\Actions\Stores\Retrieve as StoreRetrieve;

return function (App $app) {

    $routeCollector = $app->getRouteCollector();
    $routeCollector->setDefaultInvocationStrategy(new RequestResponseArgs());

    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        return $response;
    });

    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->post('/login', Login::class);
        $group->post('/transaction', Upload::class);

        $group->get('/transaction', TransactionRetrieve::class);
        $group->get('/transaction/store/{store_id}', TransactionRetrieve::class);

        $group->get('/store', StoreRetrieve::class);
    });
};
