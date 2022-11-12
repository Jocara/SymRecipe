<?php

namespace App\DataFixtures;

use App\Entity\Ingrediant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    private Generator $fake;

    /**
     * @var Generator
     */
    public function __construct()
    {
        $this->faker = Faker\Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 50; $i++) {
            $ingredient = new Ingrediant();
            $ingredient->setName($this->faker->word())
                ->setPrice(mt_rand(0, 100));
            $manager->persist($ingredient);
        }
        $manager->flush();
    }
}
