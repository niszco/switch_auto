<?php

declare(strict_types=1);

namespace App\Doctrine\DBAL\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

abstract class EnumType extends Type
{
    /**
     * @return class-string
     */
    protected abstract function getEnum(): string;

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        $enum = $this->getEnum();
        $cases = array_map(
            fn ($enumItem) => "'{$enumItem->value}'",
            $enum::cases()
        );

        return sprintf('ENUM(%s)', implode(', ', $cases));
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        $enumClass = $this->getEnum();

        return $enumClass::from($value);
    }

    public function convertToDatabaseValue($enum, AbstractPlatform $platform): mixed
    {
        return $enum;
    }
}
