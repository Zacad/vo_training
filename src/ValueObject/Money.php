<?php

namespace App\ValueObject;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class Money extends ValueObject
{

    public function __construct(
        /**
         * @ORM\Column(type="integer")
         */
        private int $value,
        /**
         * @ORM\Column(type="string")
         */
        private string $currency
    ) {
        if ($this->isCurrencyFormatInvalid()) {
            throw new \InvalidArgumentException("Currency format invalid");
        }

        $this->hash = $this->calculateHash();
    }

    /**
     * @return bool
     */
    private function isCurrencyFormatInvalid(): bool
    {
        return strlen($this->currency) !== 3;
    }

    public function hash(): string
    {
        return $this->hash;
    }

    private function calculateHash(): string
    {
        $hashData = $this->value.$this->currency;

        return hash('sha256', $hashData);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function currency(): string
    {
        return $this->currency;
    }

    public function add(Money $toAdd): Money
    {
        if ($this->currency !== $toAdd->currency()) {
            throw new \DomainException("Currencies must be same to add Money objects");
        }

        $newValue = $this->value + $toAdd->value;
        return new Money($newValue, $this->currency);
    }
}