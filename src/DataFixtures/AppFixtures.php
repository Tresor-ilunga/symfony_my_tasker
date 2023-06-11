<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Priority;
use App\Entity\Projects;
use App\Entity\Task;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

/**
 * Class AppFixtures
 *
 * @author tresor-ilunga <ilungat82@gmail.com>
 */
class AppFixtures extends Fixture
{
    /**
     * @var Generator
     */
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        // Users
        $admin = new User();
        $admin->setName('Admin')
            ->setEmail('admin@admin.com')
            ->setRoles(['ROLE_USER', 'ROLE_ADMIN'])
            ->setPlainPassword('password');

        $users[] = $admin;
        $manager->persist($admin);

        $users = [];
        for ($i = 0; $i < 10; $i++)
        {
            $user = new User();
            $user->setName($this->faker->name())
                ->setEmail($this->faker->email())
                ->setRoles(['ROLE_USER'])
                ->setPlainPassword('password');

            $users[] = $user;
            $manager->persist($user);
        }

        // Priorities
        for ($i = 0; $i < 20; $i++)
        {
            $priority = new Priority();
            $priority->setName($this->faker->word())
                ->setValue($this->faker->numberBetween(1, 3))
                ->setUser($users[mt_rand(0, count($users) - 1)]);

            $manager->persist($priority);
        }

        // Tasks
        $tasks = [];

        for ($i = 0; $i < 20; $i++)
        {
            $task = new Task();
            $task->setTitle($this->faker->sentence())
                ->setDescription($this->faker->text())
                ->setPriorities($this->faker->randomElement(['high', 'medium', 'low']))
                ->setState($this->faker->randomElement(['todo', 'inprogress', 'done']))
                ->setUser($users[mt_rand(0, count($users) - 1)]);

            $tasks[] = $task;
            $manager->persist($task);

        }

        // Projects
        $projects = [];

        for ($i = 0; $i < 20; $i++)
        {
            $project = new Projects();
            $project->setProjectName($this->faker->word())
                ->setProjectLead($this->faker->name())
                ->setTeam($this->faker->name())
                ->setProgress($this->faker->numberBetween(0, 100));

            $projects[] = $project;
            $manager->persist($project);
        }

        $manager->flush();
    }
}