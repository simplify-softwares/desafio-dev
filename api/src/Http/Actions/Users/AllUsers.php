<?php

namespace App\Http\Actions\Users;

use App\Entities\User;
use App\Traits\JsonResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AllUsers
{
    use JsonResponse;

    private $em;
    protected $userRepository; 

    public function __construct(ContainerInterface $container)
    {
        $this->em = $container->get('em');
        $this->userRepository = $container->get(UserRepositoryInterface::class);
        $this->userRepository->setEntityManager($this->em);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $this->em->setEntity(User::class);
        //$rows = $this->em->query("select name, id from users where id = ?", [1]);
        //$rows = $this->em->fetchAll();
        //$rows = $this->userRepository->getUserByEmail('admin@admin.com');
        $row = $this->em->fetchOne(1);
        return $this->asJson($response, $row);
    }
}