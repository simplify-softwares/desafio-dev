<?php

declare(strict_types=1);

namespace App\Domain\TypeTransaction;

use App\Domain\TypeTransaction\ValueObjects\{
    TypeNumber,
    TypeSignal
};

final class TypeTransaction
{
    private TypeNumber $typeNumber;
    private string $description;
    private TypeSignal $typeSignal;

    /**
     * @return \App\Domain\TypeTransaction\ValueObjects\TypeNumber
     */
    public function getTypeNumber(): TypeNumber
    {
        return $this->typeNumber;
    }

    /**
     * @param \App\Domain\TypeTransaction\ValueObjects\TypeNumber $typeNumber
     * @return TypeTransaction
     */
    public function setTypeNumber(TypeNumber $typeNumber): TypeTransaction
    {
        $this->typeNumber = $typeNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return TypeTransaction
     */
    public function setDescription(string $description): TypeTransaction
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \App\Domain\TypeTransaction\ValueObjects\TypeSignal
     */
    public function getTypeSignal(): TypeSignal
    {
        return $this->typeSignal;
    }

    /**
     * @param \App\Domain\TypeTransaction\ValueObjects\TypeSignal $typeSignal
     * @return TypeTransaction
     */
    public function setTypeSignal(TypeSignal $typeSignal): TypeTransaction
    {
        $this->typeSignal = $typeSignal;
        return $this;
    }


}