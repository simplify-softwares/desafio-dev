<?php

namespace App\Core\Entity;

final class EntityManager
{
    private $conn;
    private $entity;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->conn->setFetchMode(ADODB_FETCH_ASSOC);
    }

    public function setEntity($entity): self
    {
        $this->entity = $entity;
        return $this;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function save(EntityInterface $entity)
    {
        $dados = $entity->toArray();
        $table = $this->entity::tableName();
        $sql = $this->conn->getInsertSql($table, $dados);

        return $this->conn->execute($sql);
    }

    public function update(EntityInterface $entity)
    {
        $dados = $entity->toArray();
        $recordSet = $this->getOne($entity->{$this->entity::primaryKey()});
        $sql = $this->conn->getUpdateSql($recordSet, $dados);

        return $this->conn->execute($sql);
    }

    public function fetchAll(array $params = [], array $fields = [], string $order = "")
    {
        $fields = empty($fields) ? "*" : implode(", ", $fields);
        $sql = "select $fields from " . $this->entity::tableName();

        if (!empty($params)) {
            $sql .= " where ";
            $chaves = array_keys($params);
            $params = array_values($params);

            $sql .= implode(" = ? and ", $chaves) . " = ?"; //TODO: Pensar numa forma melhor de fazer isso.
       }

       if (!empty($order)) {
           $sql .= " order by " . $order;
       }

       return $this->conn->getAll($sql, $params);
    }

    public function fetchOne(int $id)
    {
        $exec = $this->getOne($id);
        return $exec->fetchRow();
    }

    public function delete(int $id)
    {
        $sql = "delete from  " . $this->entity::tableName() . " where " . $this->entity::primaryKey() . " = ?";
        return $this->conn->execute($sql, [$id]);
    }

    public function query(string $sql, array $params = [])
    {
        $rows = $this->conn->getAll($sql, $params);

        if (empty($rows)) {
            return [];
        }

        return $rows;
    }

    public function execute(string $cmd, array $params = [])
    {
        return $this->conn->execute($cmd, $params);
    }

    private function objectToArray(EntityInterface $entity)
    {
        $retorno = [];
        foreach($entity as $k => $v) {
            if(!is_null($v)) {
                $retorno[$k] = $v;
            }
        }
        return $retorno;
    }

    private function getOne($id) {
        $sql = "select * from " . $this->entity::tableName() . " where " . $this->entity::primaryKey() . " = ?";
        return $this->conn->execute($sql, [$id]);
    }
}