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
use Symfony\Component\Form\ChoiceList\ChoiceList;
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
            ])

            ->add('energyTypes', ChoiceType::class, [
                'choices' => energyTypes::cases(),
            ])

            ->add('gearboxType', ChoiceType::class, [
                'choices' => gearboxType::cases(),
            ])

            ->add('typeOfVehicle', ChoiceType::class, [
                'choices' => typeOfVehicle::cases(),
            ])
            ->add('brand', EntityType::class, [
                'class' => Brands::class,
                'choice_label' => 'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
