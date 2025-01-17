<?php

namespace App\Repositories\Interfaces;

use App\Core\Entity\EntityInterface;

interface StoreRepositoryInterface
{
    public function insertStore(EntityInterface $entity);
    public function getByStoreName(string $name);
    public function getAll();
}
