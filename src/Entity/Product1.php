<?php

namespace App\Entity;

use App\Repository\Product1Repository;
use App\ValueObject\Money;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=Product1Repository::class)
 */
class Product1
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $priceValue;

    /**
     * @ORM\Column(type="string")
     */
    private $priceCurrency;

    public function __construct(string $name, Money $price)
    {
        $this->name = $name;
        $this->priceValue = $price->value();
        $this->priceCurrency = $price->currency();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function setPrice(Money $price)
    {
        $this->priceValue = $price->value();
        $this->priceCurrency = $price->currency();
    }

    public function getPrice()
    {
        return new Money($this->priceValue, $this->priceCurrency);
    }

}
