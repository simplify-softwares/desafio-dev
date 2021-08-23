<?php

namespace App\Repositories\Interfaces;

use App\Core\Entity\EntityInterface;

interface TransactionRepositoryInterface
{
    public function insertTransaction(EntityInterface $entity);
}
