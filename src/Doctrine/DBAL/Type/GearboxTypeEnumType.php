<?php

declare(strict_types=1);

namespace App\Doctrine\DBAL\Type;

use App\Enum\GearboxType;

class GearboxTypeEnumType extends EnumType
{
    protected function getEnum(): string
    {
        return GearboxType::class;
    }

    public function getName(): string
    {
        return 'gearbox_type_enum';
    }
}

