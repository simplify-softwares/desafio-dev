<?php
namespace App\Http\Actions\Transactions;

use App\Entities\Store;
use App\Traits\JsonResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

final class Retrieve
{
    use JsonResponse;

    private $em;
    private $transactionRepository;

    public function __construct(ContainerInterface $container)
    {
        $this->em = $container->get('em');
        $this->transactionRepository = $container->get(TransactionRepositoryInterface::class);
        $this->transactionRepository->setEntityManager($this->em);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, ?string $store_id = null): ResponseInterface
    {
        $store = null;

        if (!is_null($store_id)) {
            $result = $this->em->setEntity(Store::class)->fetchOne($store_id) ?? [];
            
            if (!empty($result)) {
                $store = new Store();
                $store->setName($result['name'])
                        ->setOwner($result['owner'])
                        ->setId($result['id']);
            }
        }

        $rows = $this->transactionRepository->getTransactionAllOrByStore($store);
        
        return $this->asJson($response, $rows);
    }
}
