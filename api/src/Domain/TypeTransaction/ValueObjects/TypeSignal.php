<?php

declare(strict_types=1);

namespace App\Domain\TypeTransaction\ValueObjects;

use DomainException;

final class TypeSignal
{
    private string $typeSignal;

    public function __construct(string $typeSignal)
    {
        if (!in_array($typeSignal, ["+", "-"])) {
            throw new DomainException("Signal must be plus signal or minus signal;");
        }

        $this->typeSignal = $typeSignal;
    }

    public function __toString(): string
    {
        return $this->typeSignal;
    }
}