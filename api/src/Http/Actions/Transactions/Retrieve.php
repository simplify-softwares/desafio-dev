<?php
namespace App\Http\Actions\Transactions;

use App\Entities\Store;
use App\Traits\JsonResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use DateTimeImmutable;

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

        $rows = $this->transactionRepository->getTransactionAllOrByStore();
        if (!is_null($store_id)) {
            $result = $this->em->setEntity(Store::class)->fetchOne($store_id) ?? [];

            if (!$result) {
                return $this->asJson($response, [
                    'status' => 'fail',
                    'data' => [
                        'title' => 'Loja não encontrada!'
                    ]
                ]);
            }

            $store = new Store();
            $store->setName($result['name'])
                    ->setOwner($result['owner'])
                    ->setId($result['id']);
            
            $rows = $this->transactionRepository->getTransactionAllOrByStore($store);
        }

        $data = [
            'status' => 'success',
            'data' => [
                'transactions' => [],
                'total' => "R$ 0,00",
                'store' => !empty($store) ? $store->toArray() : null
            ]
        ];

        if (count($rows) > 0) {
            $result = [];
            $total = 0;
            foreach ($rows as $i => $row) {
                $result[$i] = $row;

                switch ($row['signal']) {
                    case "+":
                        $total += $row['price'];
                        break;
                    case "-":
                        $total -= $row['price'];
                        break;  
                }

                $result[$i]['transaction_date'] = (new DateTimeImmutable($row['transaction_date']))->format("d/m/Y \à\s H:i:s");
                $result[$i]['price'] = "R$ " . number_format($row['price'], 2, ",", ".");
            }

            $data = [
                'status' => 'success',
                'data' => [
                    'transactions' => $result,
                    'total' => "R$ " . number_format($total, 2, ",", "."),
                    'store' => !empty($store) ? $store->toArray() : null
                ]
            ];
        }

        return $this->asJson($response, $data);
    }
}
