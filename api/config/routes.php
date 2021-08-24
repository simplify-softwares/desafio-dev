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

    $app->add(function (Request $request, $handler) {
        $response = $handler->handle($request);
        return $response
                ->withHeader('Access-Control-Allow-Origin', '*')
                ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
                ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    });

    $app->group('/api', function (RouteCollectorProxy $group) {
        $group->get('/users', AllUsers::class);

        $group->get('/gera-jwt', function (ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface{
            $token = JWT::encode(['id' => 1, 'email' => 'gilsonc.reis@gmail.com'], 'd4a5f566bb28530e041f4d75614c73ee', "HS256");

            $response->getBody()->write($token);
            return $response;
        });

        $group->post('/login', Login::class);
        $group->post('/transaction', Upload::class);

        $group->get('/transaction', Retrieve::class);
        $group->get('/transaction/store/{store_id}', Retrieve::class);
    });

    /**
     * Catch-all route to serve a 404 Not Found page if none of the routes match
     * NOTE: make sure this route is defined last
     */
    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function ($request, $response) {
        throw new HttpNotFoundException($request);
    });

};
