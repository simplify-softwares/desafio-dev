<?php

namespace App\Traits;

use Psr\Http\Message\ResponseInterface;

trait JsonResponse
{
    public function asJson(ResponseInterface $response, array $payload): ResponseInterface
    {
        $response->getBody()->write(json_encode($payload, JSON_PRETTY_PRINT));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    }
}