<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Class UserFixtures
 *
 *
 * @author Tresor-ilunga <ilungat82@gmail.com>
 */
class UserFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // My user
        $user = new User();
        $user->setName('Admin')
            ->setFirstname('Admin01')
            ->setEmail('admin@admin.com')
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
            ->setPlainPassword('password');

        $manager->persist($user);

        for ($i = 0; $i < 9; $i++)
        {
            $user = new User();
            $user->setName($faker->name())
                ->setFirstname($faker->firstName)
                ->setEmail($faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password');

            $manager->persist($user);
        }

        $manager->flush();
    }
}