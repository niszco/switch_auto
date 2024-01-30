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
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $colorChoices = [];
        $typeOfVehicleChoices = [];
        $energyTypesChoices = [];
        $gearboxTypeChoices = [];

        foreach (Color::cases() as $color) {
            $colorChoices[$color->value] = $color->value;
        }

        foreach (TypeOfVehicle::cases() as $typeOfVehicle) {
            $typeOfVehicleChoices[$typeOfVehicle->value] = $typeOfVehicle->value;
        }

        foreach (GearboxType::cases() as $gearboxType) {
            $gearboxTypeChoices[$gearboxType->value] = $gearboxType->value;
        }

        foreach (EnergyTypes::cases() as $energyTypes) {
            $energyTypesChoices[$energyTypes->value] = $energyTypes->value;
        }

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
                'choices' => $colorChoices,
                'constraints' => [
                    new NotBlank(),
                    new Choice(choices: Color::cases(), message: 'Invalid color value.'),
                ],
            ])

            ->add('energyTypes', ChoiceType::class, [
                'choices' => $energyTypesChoices,
                'constraints' => [
                    new NotBlank(),
                    new Choice(choices: EnergyTypes::cases(), message: 'Invalid color value.'),
                ],
            ])

            ->add('gearboxType', ChoiceType::class, [
                'choices' => $gearboxTypeChoices,
                'constraints' => [
                    new NotBlank(),
                    new Choice(choices: GearboxType::cases(), message: 'Invalid color value.'),
                ],
            ])

            ->add('typeOfVehicle', ChoiceType::class, [
                'choices' => $typeOfVehicleChoices,
                'constraints' => [
                    new NotBlank(),
                    new Choice(choices: TypeOfVehicle::cases(), message: 'Invalid color value.'),
                ],
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
