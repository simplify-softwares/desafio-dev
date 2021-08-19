<?php

namespace App\Domain\Transaction\ValueObjects;

use DomainException;

final class Card
{
    private string $card;

    public function __construct(string $card)
    {
        if (strlen($card) !== 12) {
            throw new DomainException("Card must be 12 characters.");
        }

        $this->card = $card;
    }

    public function __toString(): string
    {
        return $this->card;
    }

}