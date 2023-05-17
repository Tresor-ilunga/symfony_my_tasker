<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Priority;
use App\Entity\Task;
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

        // Priorities
        for ($i = 0; $i < 50; $i++)
        {
            $priority = new Priority();
            $priority->setName($this->faker->word())
                ->setValue($this->faker->numberBetween(1, 3));

            $manager->persist($priority);
        }

        // Tasks
        for ($i = 0; $i < 50; $i++)
        {
            $task = new Task();
            $task->setTitle($this->faker->sentence())
                ->setDescription($this->faker->text())
                ->setPriorities($this->faker->randomElement(['high', 'medium', 'low']))
                ->setState($this->faker->randomElement(['todo', 'inprogress', 'done']));

            $manager->persist($task);

        }

        $manager->flush();
    }
}