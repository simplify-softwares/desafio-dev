<?php

declare(strict_types=1);

namespace App\Domain\TypeTransaction\ValueObjects;

final class TypeNumber
{
    private int $typeNumber;

    public function __construct(int $typeNumber)
    {
        if ($typeNumber < 1 || $typeNumber > 9) {
            throw new \DomainException("Type of Transaction must be between 1 and 9");
        }

        $this->typeNumber = $typeNumber;
    }

    public function __toString(): string
    {
        return (string)$this->typeNumber;
    }

}