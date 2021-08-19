<?php

namespace App\Domain\Transaction;

use DateTimeInterface;

final class Transaction
{
    private float $value;
    private DateTimeInterface $date;
    private DateTimeInterface $time;
    private Cpf $cpf;
    private Card $card;
}