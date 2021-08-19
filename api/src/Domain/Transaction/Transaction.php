<?php

declare(strict_types=1);

namespace App\Domain\Transaction;

use DateTimeInterface;
use App\Domain\ValueObjects\{
    Cpf,
    Card
};

final class Transaction
{
    private float $value;
    private DateTimeInterface $date;
    private DateTimeInterface $time;
    private Cpf $cpf;
    private Card $card;

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return Transaction
     */
    public function setValue(float $value): Transaction
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     * @return Transaction
     */
    public function setDate(DateTimeInterface $date): Transaction
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getTime(): DateTimeInterface
    {
        return $this->time;
    }

    /**
     * @param \DateTimeInterface $time
     * @return Transaction
     */
    public function setTime(DateTimeInterface $time): Transaction
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return \App\Domain\Transaction\Cpf
     */
    public function getCpf(): Cpf
    {
        return $this->cpf;
    }

    /**
     * @param \App\Domain\Transaction\Cpf $cpf
     * @return Transaction
     */
    public function setCpf(Cpf $cpf): Transaction
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return \App\Domain\Transaction\Card
     */
    public function getCard(): Card
    {
        return $this->card;
    }

    /**
     * @param \App\Domain\Transaction\Card $card
     * @return Transaction
     */
    public function setCard(Card $card): Transaction
    {
        $this->card = $card;
        return $this;
    }


}