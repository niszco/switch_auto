<?php
// src/DataFixtures/EnergyTypeFixtures.php

namespace App\DataFixtures;

use App\Entity\EnergyType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EnergyTypeFixtures extends Fixture
{
    public const ENERGY_TYPE_REFERENCE = "Type d'énergie :";
    public function load(ObjectManager $manager)
    {

        $energyTypeData = [
            "Hybride",
            "Micro-Hybride",
            "Hybride SP95 rechargeable",
            "Hybride E85 rechargeable",
            "Hybride diesel rechargeable",
            "Essence",
            "Diesel",
            "GPL",
            "Hydrogène",
            "Autres énergies alternatives",
            "Électrique",
        ];

        foreach ($energyTypeData as $energyTypeValue) {
            $energyType = new EnergyType();
            $energyType->setName($energyTypeValue);

            $manager->persist($energyType);

            $this->addReference(self::ENERGY_TYPE_REFERENCE . $energyTypeValue, $energyType);
        }

        $manager->flush();
    }
}
