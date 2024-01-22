<?php

namespace App\Form;

use App\Entity\Vehicle;
use Symfony\Component\Form\AbstractType;
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
            ->add('color')
            ->add('typeOfVehicle')
            ->add('gearboxType')
            ->add('brand')
            ->add('energyTypes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
