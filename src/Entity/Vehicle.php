<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $vehicleCondition = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    private ?string $localisation = null;

    #[ORM\Column(type: 'color_enum')]
    private $color = null;

    #[ORM\Column(type: 'type_of_vehicle_enum')]
    private $typeOfVehicle = null;

    #[ORM\Column(length: 255)]
    private ?string $carMileage = null;

    #[ORM\Column(type: 'gearbox_type_enum')]
    private $gearboxType = null;

    #[ORM\Column(length: 255)]
    private ?string $finishes = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $length = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $width = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $tireSpec = null;

    #[ORM\Column]
    private ?int $year = null;

    #[ORM\Column(length: 255)]
    private ?string $images = null;

    #[ORM\Column(length: 30)]
    private ?string $numberOfSeats = null;

    #[ORM\Column(length: 30)]
    private ?string $numberOfDoors = null;

    #[ORM\Column(length: 30)]
    private ?string $horsepower = null;

    #[ORM\Column(length: 30)]
    private ?string $fiscalHorsePower = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $co2Emissions = null;

    #[ORM\Column(length: 30)]
    private ?string $energyConsumption = null;

    #[ORM\ManyToMany(targetEntity: EnergyType::class, mappedBy: 'vehicle')]
    private Collection $energyTypes;

    #[ORM\ManyToOne(inversedBy: 'vehicles')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brands $brand = null;

    public function __construct()
    {
        $this->energyTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getVehicleCondition(): ?string
    {
        return $this->vehicleCondition;
    }

    public function setVehicleCondition(string $vehicleCondition): static
    {
        $this->vehicleCondition = $vehicleCondition;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): static
    {
        $this->localisation = $localisation;

        return $this;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getTypeOfVehicle()
    {
        return $this->typeOfVehicle;
    }

    public function setTypeOfVehicle($typeOfVehicle): static
    {
        $this->typeOfVehicle = $typeOfVehicle;

        return $this;
    }

    public function getCarMileage(): ?string
    {
        return $this->carMileage;
    }

    public function setCarMileage(string $carMileage): static
    {
        $this->carMileage = $carMileage;

        return $this;
    }

    public function getGearboxType()
    {
        return $this->gearboxType;
    }

    public function setGearboxType($gearboxType): static
    {
        $this->gearboxType = $gearboxType;

        return $this;
    }

    public function getFinishes(): ?string
    {
        return $this->finishes;
    }

    public function setFinishes(string $finishes): static
    {
        $this->finishes = $finishes;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(?string $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(?string $width): static
    {
        $this->width = $width;

        return $this;
    }

    public function getTireSpec(): ?string
    {
        return $this->tireSpec;
    }

    public function setTireSpec(?string $tireSpec): static
    {
        $this->tireSpec = $tireSpec;

        return $this;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getImages(): ?string
    {
        return $this->images;
    }

    public function setImages(string $images): static
    {
        $this->images = $images;

        return $this;
    }

    public function getNumberOfSeats(): ?string
    {
        return $this->numberOfSeats;
    }

    public function setNumberOfSeats(string $numberOfSeats): static
    {
        $this->numberOfSeats = $numberOfSeats;

        return $this;
    }

    public function getNumberOfDoors(): ?string
    {
        return $this->numberOfDoors;
    }

    public function setNumberOfDoors(string $numberOfDoors): static
    {
        $this->numberOfDoors = $numberOfDoors;

        return $this;
    }

    public function getHorsepower(): ?string
    {
        return $this->horsepower;
    }

    public function setHorsepower(string $horsepower): static
    {
        $this->horsepower = $horsepower;

        return $this;
    }

    public function getFiscalHorsePower(): ?string
    {
        return $this->fiscalHorsePower;
    }

    public function setFiscalHorsePower(string $fiscalHorsePower): static
    {
        $this->fiscalHorsePower = $fiscalHorsePower;

        return $this;
    }

    public function getCo2Emissions(): ?string
    {
        return $this->co2Emissions;
    }

    public function setCo2Emissions(?string $co2Emissions): static
    {
        $this->co2Emissions = $co2Emissions;

        return $this;
    }

    public function getEnergyConsumption(): ?string
    {
        return $this->energyConsumption;
    }

    public function setEnergyConsumption(string $energyConsumption): static
    {
        $this->energyConsumption = $energyConsumption;

        return $this;
    }

    /**
     * @return Collection<int, EnergyType>
     */
    public function getEnergyTypes(): Collection
    {
        return $this->energyTypes;
    }

    public function addEnergyType(EnergyType $energyType): static
    {
        if (!$this->energyTypes->contains($energyType)) {
            $this->energyTypes->add($energyType);
            $energyType->addVehicle($this);
        }

        return $this;
    }

    public function removeEnergyType(EnergyType $energyType): static
    {
        if ($this->energyTypes->removeElement($energyType)) {
            $energyType->removeVehicle($this);
        }

        return $this;
    }

    public function getBrand(): ?Brands
    {
        return $this->brand;
    }

    public function setBrand(?Brands $brand): static
    {
        $this->brand = $brand;

        return $this;
    }
}
