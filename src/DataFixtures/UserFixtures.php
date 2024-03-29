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

        $admin = new User();
        $admin->setUsername('admin');
        $admin->setFirstName('');
        $admin->setLastName('');
        $admin->setCompanyName('');
        $admin->setTypeOfCustomers(TypeOfCustomers::PARTICULIERS);
        $admin->setRoles(['ROLE_ADMIN']);

        $encodedPassword = $this->passwordEncoder->hashPassword($admin, 'admin');
        $admin->setPassword($encodedPassword);

        $manager->persist($admin);

        $user = new User();
        $user->setUsername('user');
        $user->setFirstName('');
        $user->setLastName('');
        $user->setCompanyName('');
        $user->setTypeOfCustomers(TypeOfCustomers::PARTICULIERS);
        $user->setRoles(['ROLE_USER']);

        $encodedPassword = $this->passwordEncoder->hashPassword($user, 'user');
        $user->setPassword($encodedPassword);

        $manager->persist($user);

        $manager->flush();
    }
}
