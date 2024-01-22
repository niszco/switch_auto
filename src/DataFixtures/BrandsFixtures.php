<?php
// src/DataFixtures/BrandsFixtures.php

namespace App\DataFixtures;

use App\Entity\Brands;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandsFixtures extends Fixture
{
    public const BRAND_REFERENCE = 'brand_reference';

    public function load(ObjectManager $manager)
    {
        $brandData = [
            [
                'name' => 'Ford',
                'description' => 'An American multinational automaker',
                'logo' => '/assets/ford_logo.png',
            ],
            [
                'name' => 'Volkswagen',
                'description' => 'A German multinational automotive manufacturing company',
                'logo' => '/assets/vw_logo.png',
            ],
        ];

        foreach ($brandData as $data) {
            $brand = new Brands();
            $brand->setName($data['name'])
                ->setDescription($data['description'])
                ->setLogo($data['logo']);

            $manager->persist($brand);

            $this->addReference(self::BRAND_REFERENCE . '_' . $data['name'], $brand);
        }

        $manager->flush();
    }
}

