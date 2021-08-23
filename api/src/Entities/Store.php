<?php

namespace App\Entities;

use App\Core\Entity\EntityInterface;

class Store implements EntityInterface
{
    private int $id;
    private string $owner;
    private string $name;

    public static function tableName(): string
    {
        return 'store';
    }

    public static function primaryKey(): string
    {
        return "id";
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param int $id
     *
     * @return self
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of owner
     *
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * Set the value of owner
     *
     * @param string $owner
     *
     * @return self
     */
    public function setOwner(string $owner): self
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
