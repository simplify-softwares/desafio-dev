<?php

namespace App\Repositories\Interfaces;

use App\Core\Entity\EntityManager;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email): array;
    public function auth(array $input): array;
}