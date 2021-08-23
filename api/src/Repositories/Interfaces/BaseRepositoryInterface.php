<?php

namespace App\Repositories\Interfaces;

use App\Core\Entity\EntityManager;

interface BaseRepositoryInterface
{
    public function setEntityManager(EntityManager $em): void;
}
