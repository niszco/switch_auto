<?php

namespace App\Enum;

enum EnergyTypes: string
{
    case HYBRIDE = 'Hybride';
    case MICRO_HYBRIDE = 'Micro-Hybride';
    case HYBRIDE_SP95_RECHARGEABLE = 'Hybride SP95 rechargeable';
    case HYBRIDE_E85_RECHARGEABLE = 'Hybride E85 rechargeable';
    case HYBRIDE_DIESEL_RECHARGEABLE = 'Hybride diesel rechargeable';
    case ESSENCE = 'Essence';
    case DIESEL = 'Diesel';

    case GPL = 'GPL';
    case HYDROGENE = 'Hydrogène';
    case AUTRES_ENERGIES_ALTERNATIVES = 'Autres énergies alternatives';
    case ELECTRIQUE = 'Électrique';
}