<?php

namespace App\Repositories;

use App\Core\Entity\EntityManager;
use App\Core\Entity\EntityInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\TransactionTypeRepositoryInterface;

class TransactionTypeRepository  implements BaseRepositoryInterface, TransactionTypeRepositoryInterface
{
    private EntityManager $em;

    public function setEntityManager(EntityManager $em): void
    {
        $this->em = $em;
    }

    public function getByType(int $type)
    {
        return $this->em->query("select * from transaction_type where type = ?", [$type]);
    }
    
}
