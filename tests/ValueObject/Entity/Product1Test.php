<?php

namespace App\Tests\ValueObject\Entity;


use App\Entity\Product1;
use App\ValueObject\Money;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class Product1Test extends KernelTestCase
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
        $product = new Product1('car', $price);

        $em = $this->getEntityManager();
        $em->persist($product);
        $em->flush();

        $this->assertInstanceOf(Money::class, $product->getPrice());
    }
}