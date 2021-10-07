<?php

namespace App\Entity;

use App\Repository\ProductCustomMappingRepository;
use App\ValueObject\Money;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductCustomMappingRepository::class)
 */
class ProductCustomMapping
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
     * @ORM\Column(type="money", nullable=true)
     */
    private $price;

    public function __construct(string $name, ?Money $price)
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

    /**
     * @return null|Money
     */
    public function getPrice(): ?Money
    {
        return $this->price;
    }

    /**
     * @param  ?Money  $price
     */
    public function setPrice(?Money $price): void
    {
        $this->price = $price;
    }

}
