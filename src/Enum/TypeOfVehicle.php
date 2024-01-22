<?php

namespace App\Enum;

enum TypeOfVehicle: string
{
    case QUATRE_X_QUATRE = "4X4";
    case CITADINE = "Citadine";
    case BERLINE = "Berline";
    case BREAK = "Break";
    case UTILITAIRES = "Utilitaires";
    case SANS_PERMIS = "Sans Permis";

}