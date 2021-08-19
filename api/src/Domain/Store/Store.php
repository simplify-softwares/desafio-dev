<?php

declare(strict_types=1);

namespace App\Domain\Store;

final class Store
{
    private string $owner;
    private string $name;

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     * @return Store
     */
    public function setOwner(string $owner): Store
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Store
     */
    public function setName(string $name): Store
    {
        $this->name = $name;
        return $this;
    }


}