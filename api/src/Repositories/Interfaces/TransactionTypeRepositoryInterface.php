<?php

namespace App\Repositories\Interfaces;

interface TransactionTypeRepositoryInterface
{
    public function getByType(int $type);
}
