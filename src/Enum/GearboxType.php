<?php

namespace App\Enum;

enum GearboxType: string
{
    case MANUELLE = "Boîte Manuelle";
    case AUTOMATIQUE = "Boîte Automatique";
    case AUTOMATIQUE_PILOTEE = "Boîte Automatique Pilotée";
}