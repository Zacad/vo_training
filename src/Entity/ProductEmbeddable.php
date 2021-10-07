<?php

namespace App\Entity;

use App\Repository\ProductEmbeddableRepository;
use App\ValueObject\Money;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductEmbeddableRepository::class)
 */
class ProductEmbeddable
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
     * @ORM\Embedded(class="App\ValueObject\Money", columnPrefix="price")
     */
    private $price;

    public function __construct(string $name, Money $price)
    {
        $this->name = $name;
        $this->price = $price;
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

    public function getPrice(): Money
    {
        return $this->price;
    }
}
