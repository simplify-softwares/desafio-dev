<?php

namespace App\Entities;

use DateTimeImmutable;
use DateTimeInterface;
use App\Core\Entity\EntityInterface;

class Transaction implements EntityInterface
{
    private int $type;
    private DateTimeInterface $transaction_date;
    private float $price;
    private string $cpf;
    private string $card;
    private int $store_id;

    public static function tableName(): string
    {
        return 'transaction';
    }

    public static function primaryKey(): string
    {
        return "id";
    }

    /**
     * Get the value of type
     *
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @param int $type
     *
     * @return self
     */
    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param float $price
     *
     * @return self
     */
    public function setPrice(float $price): self
    {
        $this->price = $price / 100;
        return $this;
    }

    /**
     * Get the value of cpf
     *
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     *
     * @param string $cpf
     *
     * @return self
     */
    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of card
     *
     * @return string
     */
    public function getCard(): string
    {
        return $this->card;
    }

    /**
     * Set the value of card
     *
     * @param string $card
     *
     * @return self
     */
    public function setCard(string $card): self
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get the value of store_id
     *
     * @return int
     */
    public function getStoreId(): int
    {
        return $this->store_id;
    }

    /**
     * Set the value of store_id
     *
     * @param int $store_id
     *
     * @return self
     */
    public function setStoreId(int $store_id): self
    {
        $this->store_id = $store_id;

        return $this;
    }

    /**
     * Get the value of transaction_data
     *
     * @return DateTimeInterface
     */
    public function getTransactionDate(): DateTimeInterface
    {
        return new DateTimeImmutable($this->transaction_date);
    }

    /**
     * Set the value of transaction_date
     *
     * @param DateTimeInterface $transaction_date
     *
     * @return self
     */
    public function setTransactionDate(DateTimeInterface $transaction_date): self
    {
        $this->transaction_date = $transaction_date->format("Y-m-d H:i:s");
        return $this;
    }
}
