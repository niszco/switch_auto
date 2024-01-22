<?php

declare(strict_types=1);

namespace App\Doctrine\DBAL\Type;

use App\Enum\TypeOfCustomers;

class TypeOfCustomersEnumType extends EnumType
{
    protected function getEnum(): string
    {
        return TypeOfCustomers::class;
    }

    public function getName(): string
    {
        return 'type_of_customers_enum';
    }
}