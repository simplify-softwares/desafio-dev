<?php

namespace App\Repositories;

use App\Core\Entity\EntityManager;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private EntityManager $em;

    public function setEntityManager(EntityManager $em): void
    {
        $this->em = $em;
    }

    public function getUserByEmail(string $email): array
    {
        return $this->em->query("select * from users where email = ?", [$email]);
    }
}