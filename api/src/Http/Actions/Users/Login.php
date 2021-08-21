<?php

namespace App\Http\Actions\Users;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Traits\JsonResponse;

class Login
{
    private $em;

    use JsonResponse;

    public function __construct(ContainerInterface $container)
    {
        $this->em = $container->get('em');
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $input = $request->getParsedBody();
        return $this->asJson($input, $response);
    }
}