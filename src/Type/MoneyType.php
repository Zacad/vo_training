<?php

namespace App\Type;

use App\ValueObject\Money;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

class MoneyType extends Type
{
    const MONEY = 'money';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return 'varchar(100)';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        [$value, $currency] = explode(' ', $value);
        return new Money($value, $currency);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }
        return $value->value().' '.$value->currency();
    }

    public function getName()
    {
        return self::MONEY;
    }
}