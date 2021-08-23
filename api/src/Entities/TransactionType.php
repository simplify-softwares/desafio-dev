<?php

namespace App\Entities;

use DateTime;
use DateTimeInterface;
use App\Core\Entity\EntityInterface;
use DomainException;

class TransactionType implements EntityInterface
{

    private int $id;
    private string $type;
    private string $description;
    private string $signal;

    public static function tableName(): string
    {
        return 'transaction_type';
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
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of signal
     *
     * @return string
     */
    public function getSignal(): string
    {
        return $this->signal;
    }

    /**
     * Set the value of signal
     *
     * @param string $signal
     *
     * @return self
     */
    public function setSignal(string $signal): self
    {
        if (!in_array($signal, ['+', '-'])) {
            throw new DomainException("The signal must be plus signal or minus signal.");
        }
        
        $this->signal = $signal;
        return $this;
    }
}
