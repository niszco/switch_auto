<?php

namespace App\Controller;

use App\Entity\Brands;
use App\Entity\Vehicle;
use App\Enum\Color;
use App\Enum\EnergyTypes;
use App\Enum\GearboxType;
use App\Enum\TypeOfVehicle;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController {

    #[Route('/', name: 'home', methods: ["GET"])]
    public function home(VehicleRepository $vehicleRepository) : Response
    {
        return $this->render('home.html.twig', [
            'vehicles' => $vehicleRepository->findAll(),
        ]);
    }
}