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
use Symfony\Component\Form\Extension\Core\Type\EnumType;
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
            ->add('color', EnumType::class, [
                'class' => Color::class,
                'choices' => Color::cases(),
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->value;
                },
                'placeholder' => 'Choisissez une couleur',
            ])
            ->add('energyTypes', EnumType::class, [
                'class' => EnergyTypes::class,
                'choices' => EnergyTypes::cases(),
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->value;
                },
                'placeholder' => 'Choisissez un type d\'énergie',
            ])
            ->add('typeOfVehicle', EnumType::class, [
                'class' => TypeOfVehicle::class,
                'choices' => TypeOfVehicle::cases(),
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->value;
                },
                'placeholder' => 'Choisissez un type de véhicule',
            ])
            ->add('gearboxType', EnumType::class, [
                'class' => GearboxType::class,
                'choices' => GearboxType::cases(),
                'choice_label' => function ($choice, $key, $value) {
                    return $choice->value;
                },
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
