<?php
namespace App\Http\Actions\Stores;

use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Traits\JsonResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class Retrieve
{
    use JsonResponse;

    private $em;
    private $storeRepository;

    public function __construct(ContainerInterface $container)
    {
        $this->em = $container->get('em');
        $this->storeRepository = $container->get(StoreRepositoryInterface::class);
        $this->storeRepository->setEntityManager($this->em);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $stores = $this->storeRepository->getAll();
        $data = [
            'status' => 'success',
            'data' => [
                'stores' => $stores
            ]
        ];

        return $this->asJson($response, $data);
    }
}
