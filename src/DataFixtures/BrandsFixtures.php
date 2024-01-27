<?php

namespace App\DataFixtures;

use App\Entity\Brands;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BrandsFixtures extends Fixture
{
    public const BRAND_REFERENCE = 'Marque :';

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
            [
                'name' => 'Toyota',
                'description' => 'A Japanese multinational automotive manufacturing company',
                'logo' => '/assets/toyota_logo.png',
            ],
            [
                'name' => 'Peugeot',
                'description' => 'A French multinational automotive manufacturing company',
                'logo' => '/assets/peugeot_logo.png',
            ],
            [
                'name' => 'Renault',
                'description' => 'A French multinational automotive manufacturing company',
                'logo' => '/assets/renault_logo.png',
            ],
        ];

        foreach ($brandData as $data) {
            $brand = new Brands();
            $brand->setName($data['name'])
                ->setDescription($data['description'])
                ->setLogo($data['logo']);

            $manager->persist($brand);

            $this->addReference(self::BRAND_REFERENCE . $data['name'], $brand);
        }

        $manager->flush();
    }
}

