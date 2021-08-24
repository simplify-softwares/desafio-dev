<?php

namespace App\Http\Actions\Users;

use Firebase\JWT\JWT;
use App\Traits\JsonResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class Login
{
    use JsonResponse;

    private $em;
    private $userRepository;

    public function __construct(ContainerInterface $container)
    {
        $this->em = $container->get('em');
        $this->userRepository = $container->get(UserRepositoryInterface::class);
        $this->userRepository->setEntityManager($this->em);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $input = $request->getParsedBody();

        $result = $this->userRepository->auth($input);

        if ($result['status'] === 'success') {
            $token = JWT::encode($result, $_ENV['SECRET_TOKEN'], "HS256");
            $result['data']['token'] = $token;
        }

        return $this->asJson($response, $result);
    }
}