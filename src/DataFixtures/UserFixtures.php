<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Enum\TypeOfCustomers;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {

        $user = new User();
        $user->setUsername('niszco');
        $user->setFirstName('Nico');
        $user->setLastName('Nico');
        $user->setCompanyName('');
        $user->setTypeOfCustomers(TypeOfCustomers::PARTICULIERS);
        $user->setRoles(['ROLE_ADMIN']);

        $encodedPassword = $this->passwordEncoder->hashPassword($user, 'admin');
        $user->setPassword($encodedPassword);

        $manager->persist($user);
        $manager->flush();
    }
}
