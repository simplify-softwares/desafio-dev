<?php

namespace App\Repositories\Interfaces;

use App\Core\Entity\EntityInterface;

interface StoreRepositoryInterface
{
    public function insertStore(EntityInterface $entity);
}
