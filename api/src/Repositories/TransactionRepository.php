<?php

namespace App\Repositories;

use App\Entities\Store;
use App\Core\Entity\EntityManager;
use App\Core\Entity\EntityInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;

class TransactionRepository  implements BaseRepositoryInterface, TransactionRepositoryInterface
{
    private EntityManager $em;

    public function setEntityManager(EntityManager $em): void
    {
        $this->em = $em;
    }

    public function insertTransaction(EntityInterface $entity)
    {
        $this->em->setEntity($entity);
        return $this->em->save($entity);
    }


    public function getTransactionAllOrByStore(?Store $store = null): array
    {
        $sql = "SELECT
        st.id,
        st.transaction_date,
        st.price,
        st.cpf,
        st.card,
        tt.`type`,
        tt.description,
        tt.`signal`,
        st.store_id
        from
            store_transaction st
            inner join transaction_type tt on st.`type`  = tt.`type`";

        $param = [];
        if (!is_null($store)) {
            $sql .= " where st.store_id = ?";
            $param[] = $store->getId();
        }

        $sql .= " order by transaction_date  desc";
            
        return $this->em->query($sql, $param);
    }
}
