<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use App\Enum\Color;
use App\Enum\EnergyTypes;
use App\Enum\TypeOfVehicle;
use App\Enum\GearboxType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class VehicleFixtures extends Fixture implements DependentFixtureInterface
{
    public const VEHICLE_REFERENCE = "Vehicule :";

    public function load(ObjectManager $manager)
    {

        $vehicleData = [
            [
                'name' => 'Ford Fiesta 90 CH 1.2L',
                'description' => 'Petite citadine fiable et compacte',
                'model' => 'Fiesta',
                'price' => 8500,
                'localisation' => 'Metz, 57000',
                'carMileage' => '35080 Km',
                'finishes' => 'Standard',
                'length' => '4 meters',
                'width' => '1.8 meters',
                'tireSpec' => '205/55 R16',
                'year' => 2018,
                'color' => Color::GRIS_CLAIR,
                'typeOfVehicle' => TypeOfVehicle::CITADINE,
                'gearboxType' => GearboxType::AUTOMATIQUE,
                'energyType' => EnergyTypes::HYBRIDE_E85_RECHARGEABLE,
                'brands' => $this->getReference(BrandsFixtures::BRAND_REFERENCE . "Ford"),
                'vehicleCondition' => 'Occasion',
                'horsepower' => '90 CV',
                'fiscalHorsePower' => '5 CV Fiscaux',
                'numberOfSeats' => 5,
                'numberOfDoors' => 4,
                'co2Emissions' => '88 g/km',
                'energyConsumption' => '6.2 L/100km',
                'images' => '/assets/CAMUUUUUS.png'
            ],
            [
                'name' => 'VW Polo V 90 CH 1.2L',
                'description' => 'Petite citadine fiable et compacte',
                'model' => 'Polo V',
                'price' => 14500,
                'localisation' => 'Metz, 57000',
                'carMileage' => '55000 Km',
                'finishes' => 'Standard',
                'length' => '4 meters',
                'width' => '1.8 meters',
                'tireSpec' => '205/55 R16',
                'year' => 2018,
                'color' => Color::NOIR,
                'typeOfVehicle' => TypeOfVehicle::CITADINE,
                'gearboxType' => GearboxType::AUTOMATIQUE,
                'energyType' => EnergyTypes::ESSENCE,
                'brands' => $this->getReference(BrandsFixtures::BRAND_REFERENCE . "Volkswagen"),
                'vehicleCondition' => 'Occasion',
                'horsepower' => '90 CV',
                'fiscalHorsePower' => '5 CV Fiscaux',
                'numberOfSeats' => 5,
                'numberOfDoors' => 4,
                'co2Emissions' => '92 g/km',
                'energyConsumption' => '5.7 L/100km',
                'images' => '/assets/CAMUUUUUS.png'
            ],
        ];

        foreach ($vehicleData as $data) {
            $vehicle = new Vehicle();
            $vehicle->setName($data['name'])
                ->setDescription($data['description'])
                ->setModel($data['model'])
                ->setPrice($data['price'])
                ->setLocalisation($data['localisation'])
                ->setCarMileage($data['carMileage'])
                ->setFinishes($data['finishes'])
                ->setLength($data['length'])
                ->setWidth($data['width'])
                ->setTireSpec($data['tireSpec'])
                ->setYear($data['year'])
                ->setColor($data['color'])
                ->setTypeOfVehicle($data['typeOfVehicle'])
                ->setGearboxType($data['gearboxType'])
                ->setEnergyType($data['energyType'])
                ->setBrand($data['brands'])
                ->setVehicleCondition($data['vehicleCondition'])
                ->setHorsepower($data['horsepower'])
                ->setFiscalHorsePower($data['fiscalHorsePower'])
                ->setNumberOfSeats($data['numberOfSeats'])
                ->setNumberOfDoors($data['numberOfDoors'])
                ->setCo2Emissions($data['co2Emissions'])
                ->setEnergyConsumption($data['energyConsumption'])
                ->setImages($data['images']);

            $manager->persist($vehicle);
        }

        $manager->flush();
    }


    public function getDependencies(): array
    {
        return [
            BrandsFixtures::class,
        ];
    }
}


