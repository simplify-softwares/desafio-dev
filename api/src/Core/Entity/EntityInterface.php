<?php

namespace App\Core\Entity;

interface EntityInterface
{
    public static function tableName(): string;
    public static function primaryKey(): string;
}