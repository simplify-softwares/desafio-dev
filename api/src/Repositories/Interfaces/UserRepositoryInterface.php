<?php

namespace App\Repositories\Interfaces;

use App\Core\Entity\EntityManager;

interface UserRepositoryInterface
{
    public function getUserByEmail(string $email): array;
}