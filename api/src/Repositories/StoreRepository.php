<?php

namespace App\Repositories;

use App\Core\Entity\EntityManager;
use App\Core\Entity\EntityInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\StoreRepositoryInterface;

class StoreRepository implements BaseRepositoryInterface, StoreRepositoryInterface
{
    private EntityManager $em;

    public function setEntityManager(EntityManager $em): void
    {
        $this->em = $em;
    }

    public function insertStore(EntityInterface $entity)
    {
        $this->em->setEntity($entity);
        return $this->em->save($entity);
    }

    public function getByStoreName(string $name)
    {
        return $this->em->query("select * from store where name = ?", [$name]);
    }

}
