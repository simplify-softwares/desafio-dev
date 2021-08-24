<?php
namespace App\Http\Actions\Transactions;

use App\Entities\Store;
use App\Entities\Transaction;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\Interfaces\TransactionTypeRepositoryInterface;
use App\Services\Cnab;
use App\Traits\JsonResponse;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class Upload
{
    use JsonResponse;

    private $em;
    private $container;
    private $transactionRepository;
    private $transactionTypeRepository;
    private $storeRepository;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $container->get('em');

        $this->transactionRepository = $container->get(TransactionRepositoryInterface::class);
        $this->transactionRepository->setEntityManager($this->em);

        $this->transactionTypeRepository = $container->get(TransactionTypeRepositoryInterface::class);
        $this->transactionTypeRepository->setEntityManager($this->em);

        $this->storeRepository = $container->get(StoreRepositoryInterface::class);
        $this->storeRepository->setEntityManager($this->em);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $cnabHandle = new Cnab($this->container);
        $cnabData = $cnabHandle->handle($request->getUploadedFiles());

        foreach ($cnabData as $i => $cnab) {
            $store = new Store();
            $store->setName($cnab['loja'])
                ->setOwner($cnab['dono']);

            $row = $this->storeRepository->getByStoreName($store->getName());
            $store->setId($row[0]['id'] ?? null);

            if (empty($row)) {
                $this->storeRepository->insertStore($store);
                $lastId = $this->em->getConn()->insert_Id();
                $store->setId($lastId);
            }

            $transaction_date = new DateTimeImmutable($cnab['data'].$cnab['hora']);
            $price = ltrim($cnab['valor'], 0);
            $price = ((float) $price);

            $transaction = new Transaction();
            $transaction->setType((integer) $cnab['tipo'])
                ->setTransactionDate($transaction_date)
                ->setPrice($price)
                ->setCpf($cnab['cpf'])
                ->setCard($cnab['cartao'])
                ->setStore($store);
            
                $this->transactionRepository->insertTransaction($transaction);
        }
        
        $retorno = [
            'status' => 'success',
            'data' => [
                'total' => $i + 1,
                'title' => "Registros inseridos com sucesso!"
            ]
            ];

        return $this->asJson($response, ['retorno' => $retorno]);
    }

    private function verifyStoreExists(Store $store)
    {
        $store = $this->storeRepository->getByStoreName($store->getName());
        return empty($store) ? false : true;
    }
}
