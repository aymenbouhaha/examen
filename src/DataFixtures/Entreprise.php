<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Entreprise extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create("fr");
        $entreprise=new \App\Entity\Entreprise();
        $entreprise->setDesignation($faker->company);
        $manager->persist($entreprise);
        $manager->flush();
    }
}
