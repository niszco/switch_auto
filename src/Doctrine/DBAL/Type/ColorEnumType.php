<?php

declare(strict_types=1);

namespace App\Doctrine\DBAL\Type;

use App\Enum\Color;

class ColorEnumType extends EnumType
{
    protected function getEnum(): string
    {
        return Color::class;
    }

    public function getName(): string
    {
        return 'color_enum';
    }
}
