<?php

declare(strict_types=1);

namespace App\Doctrine\DBAL\Type;

use App\Enum\EnergyTypes;

class EnergyTypesEnumType extends EnumType
{
    protected function getEnum(): string
    {
        return EnergyTypes::class;
    }

    public function getName(): string
    {
        return 'energy_types_enum';
    }

}
