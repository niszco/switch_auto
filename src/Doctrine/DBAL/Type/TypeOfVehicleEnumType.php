<?php

declare(strict_types=1);

namespace App\Doctrine\DBAL\Type;

use App\Enum\TypeOfVehicle;

class TypeOfVehicleEnumType extends EnumType
{
    protected function getEnum(): string
    {
        return TypeOfVehicle::class;
    }

    public function getName(): string
    {
        return 'type_of_vehicle_enum';
    }
}