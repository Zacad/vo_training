<?php

namespace App\Tests\ValueObject\Entity;

use App\Entity\ProductCustomMapping;
use App\ValueObject\Money;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductCustomMappingTest extends KernelTestCase
{
    public function setUp(): void
    {
        self::bootKernel(
            [
                'environment' => 'test'
            ]
        );

        $purger = new ORMPurger($this->getEntityManager());
        $purger->purge();
    }

    private function getEntityManager(): EntityManagerInterface
    {
        return self::$container->get('doctrine')->getManager();
    }

    public function testItCreateProduct()
    {
        $price = new Money(1000, 'PLN');
        $product = new ProductCustomMapping('car', $price);
        $product2 = new ProductCustomMapping('car', null);

        $em = $this->getEntityManager();
        $em->persist($product);
        $em->persist($product2);
        $em->flush();

        $this->assertInstanceOf(Money::class, $product->getPrice());
        $this->assertNull($product2->getPrice());
    }
}