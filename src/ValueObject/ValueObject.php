<?php

namespace App\ValueObject;

abstract class ValueObject
{
    protected ?string $hash = null;

    public abstract function hash(): string;

    public function isEqual(ValueObject $objectToCompare): bool {
        return $this->hash() === $objectToCompare->hash();
    }
}