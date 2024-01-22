<?php

namespace App\Enum;

enum TypeOfCustomers: string
{
    case PARTICULIERS = "Particulier";
    case PROFESSIONNELS = "Professionnel";
    case ENTREPRISE = "Entreprise";
}