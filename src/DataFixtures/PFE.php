<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PFE extends Fixture
{
    public function load(ObjectManager $manager): void
    {
//        $faker=Factory::create("fr");
////        $pfe=new \App\Entity\PFE();
////        $pfe->setTitle($faker->name);
////        $pfe->setStudent($faker->name);
////        $manager->persist($pfe);
////        $manager->flush();
    }
}
