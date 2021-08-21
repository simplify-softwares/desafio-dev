<?php
namespace App\Http\Actions\Transactions;

use App\Services\Cnab;
use App\Traits\JsonResponse;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

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
        $cnabData = $cnabHandle->handle([
            'upload' => $request->getUploadedFiles()
        ]);
        

        
        return $this->asJson($response, []);
    }

    private function verifyStore
}
