<?php

namespace App\Repositories\Interfaces;

use App\Core\Entity\EntityManager;

interface UserRepositoryInterface
{
    public function setEntityManager(EntityManager $em): void;
    public function getUserByEmail(string $email): array;
}