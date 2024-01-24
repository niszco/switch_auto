<?php

namespace App\Controller;

use App\Entity\Brands;
use App\Entity\EnergyType;
use App\Enum\Color;
use App\Enum\EnergyTypes;
use App\Enum\GearboxType;
use App\Enum\TypeOfVehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController {

    #[Route('/', name: 'home', methods: ["GET"])]
    public function home(EntityManagerInterface $entityManager) : Response
    {
        $colors = Color::cases();
        $types = TypeOfVehicle::cases();
        $gearboxes = GearboxType::cases();
        $energyTypes = EnergyTypes::cases();

        $brands = $entityManager->getRepository(Brands::class)->findAll();
        {
        return $this->render('home.html.twig', [
            'brands' => $brands,
            'energyTypes' => $energyTypes,
            'colors' => $colors,
            'types' => $types,
            'gearboxes' => $gearboxes
        ]);
        }
    }
}