<?php

namespace App\Controller;

use App\Entity\Brands;
use App\Entity\Vehicle;
use App\Enum\Color;
use App\Enum\EnergyTypes;
use App\Enum\GearboxType;
use App\Enum\TypeOfVehicle;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController {

    #[Route('/', name: 'home', methods: ["GET"])]
    public function home(Request $request, EntityManagerInterface $entityManager) : Response
    {
        $colors = Color::cases();
        $types = TypeOfVehicle::cases();
        $gearboxes = GearboxType::cases();
        $energyTypes = EnergyTypes::cases();

        $brands = $entityManager->getRepository(Brands::class)->findAll();

        $vehicleRepository = $entityManager->getRepository(Vehicle::class);

        $selectedColor = $request->query->get('color');
        $selectedTypeOfVehicle = $request->query->get('typeOfVehicle');
        $selectedGearbox = $request->query->get('gearboxType');
        $selectedEnergyTypes = $request->query->get('energyTypes');

        $filteredVehicles = $vehicleRepository->findBy([
            'color' => $selectedColor,
            'typeOfVehicle' => $selectedTypeOfVehicle,
            'gearboxType' => $selectedGearbox,
            'energyTypes' => $selectedEnergyTypes,
        ]);

        {
        return $this->render('home.html.twig', [
            'brands' => $brands,
            'energyTypes' => $energyTypes,
            'colors' => $colors,
            'types' => $types,
            'gearboxes' => $gearboxes,
            'filteredVehicles' => $filteredVehicles,
        ]);
        }
    }
}