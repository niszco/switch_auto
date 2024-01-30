<?php

namespace App\Form;

use App\Entity\Brands;
use App\Entity\Vehicle;
use App\Enum\Color;
use App\Enum\EnergyTypes;
use App\Enum\GearboxType;
use App\Enum\TypeOfVehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('vehicleCondition')
            ->add('model')
            ->add('price')
            ->add('localisation')
            ->add('carMileage')
            ->add('finishes')
            ->add('length')
            ->add('width')
            ->add('tireSpec')
            ->add('year')
            ->add('numberOfSeats')
            ->add('numberOfDoors')
            ->add('horsepower')
            ->add('fiscalHorsePower')
            ->add('co2Emissions')
            ->add('energyConsumption')
            ->add('color', ChoiceType::class, [
                'choices' => Color::cases(),
                'choice_label' => fn(?Color $color) => $color ? $color->value : '',
                'choice_value' => fn(?Color $color) => $color ? $color->value : '',
                'placeholder' => 'Choisissez une couleur',
            ])
            ->add('energyTypes', ChoiceType::class, [
                'choices' => EnergyTypes::cases(),
                'choice_label' => fn(?EnergyTypes $energyType) => $energyType ? $energyType->value : '',
                'choice_value' => fn(?EnergyTypes $energyType) => $energyType ? $energyType->value : '',
                'placeholder' => 'Choisissez un type d\'énergie',
            ])
            ->add('typeOfVehicle', ChoiceType::class, [
                'choices' => TypeOfVehicle::cases(),
                'choice_label' => fn(?TypeOfVehicle $typeOfVehicle) => $typeOfVehicle ? $typeOfVehicle->value : '',
                'choice_value' => fn(?TypeOfVehicle $typeOfVehicle) => $typeOfVehicle ? $typeOfVehicle->value : '',
                'placeholder' => 'Choisissez un type de véhicule',
            ])
            ->add('gearboxType', ChoiceType::class, [
                'choices' => GearboxType::cases(),
                'choice_label' => fn(?GearboxType $gearboxType) => $gearboxType ? $gearboxType->value : '',
                'choice_value' => fn(?GearboxType $gearboxType) => $gearboxType ? $gearboxType->value : '',
                'placeholder' => 'Choisissez un type de boîte de vitesse',
            ])

            ->add('brand', EntityType::class, [
                'class' => Brands::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
