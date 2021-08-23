<?php
namespace App\Http\Actions\Transactions;

use App\Entities\Transaction;
use App\Services\Cnab;
use App\Traits\JsonResponse;
use DateTime;
use DateTimeInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use function PHPSTORM_META\type;

final class Upload
{
    use JsonResponse;

    private $em;
    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->em = $container->get('em');
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args = []): ResponseInterface
    {
        $cnabHandle = new Cnab($this->container);
        $cnabData = $cnabHandle->handle($request->getUploadedFiles());
        
        $x = \DateTime::createFromFormat("YmdHis", "20210822203000");

        foreach ($cnabData as $cnab) {
            $transaction = new Transaction();
            $transaction->setType($cnab['tipo'])
                ->setTransactionDate($x)
                ->setPrice($cnab['valor'])
                ->setCpf($cnab['cpf'])
                ->setCard($cnab['cartao']);

            dump($transaction);
        }
        
        return $this->asJson($response, []);
    }

    private function verifyStoreExists() {
        
    }
}
