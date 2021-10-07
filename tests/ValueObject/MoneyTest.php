<?php

namespace App\Tests\ValueObject;

use App\ValueObject\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testItCreateMoneyObject()
    {
        $money = new Money(1000, "PLN");

        $this->assertInstanceOf(Money::class, $money);
    }

    public function testItFailsOnInvalidCurrency()
    {
        $this->expectException(\InvalidArgumentException::class);

        $money = new Money(1000, 'dollars');
    }

    public function testItCompareEqualObjects()
    {
        $money1 = new Money(1000, "PLN");
        $money2 = new Money(1000, "PLN");

        $this->assertTrue($money1->isEqual($money2));
    }

    public function testItCompareDifferentValueObjects()
    {
        $money1 = new Money(1000, "PLN");
        $money2 = new Money(1001, "PLN");

        $this->assertFalse($money1->isEqual($money2));
    }

    public function testItCompareDifferentCurrencyObjects()
    {
        $money1 = new Money(1000, "PLN");
        $money2 = new Money(1000, "PHP");

        $this->assertFalse($money1->isEqual($money2));
    }

    public function testItAddMoneyObjects()
    {
        $money1 = new Money(1000, "PLN");
        $money2 = new Money(1000, "PLN");

        $sumMoney = $money1->add($money2);

        $this->assertInstanceOf(Money::class, $sumMoney);
        $this->assertSame(2000, $sumMoney->value());
        $this->assertSame("PLN", $sumMoney->currency());
    }

    public function testItFailsAddObjectsWithDifferentCurrencies()
    {
        $this->expectException(\DomainException::class);

        $money1 = new Money(1000, "PLN");
        $money2 = new Money(1000, "EUR");

        $sumMoney = $money1->add($money2);
    }

}