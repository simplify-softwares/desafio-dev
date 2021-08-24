<?php

namespace App\Repositories\Interfaces;

use App\Entities\Store;
use App\Core\Entity\EntityInterface;

interface TransactionRepositoryInterface
{
    public function insertTransaction(EntityInterface $entity);
    public function getTransactionAllOrByStore(?Store $store = null): array;
}
