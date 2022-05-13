<?php

namespace App\DataFixtures;

use App\Entity\PFE;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Entreprise extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $faker=Factory::create("fr");
        for ($i=0;$i<20;$i++){
            $entreprise=new \App\Entity\Entreprise();
            $entreprise->setDesignation($faker->company);
            $nb=random_int(0,5);
            for ($j=0;$j<$nb;$j++){
                $pfe=new PFE();
                $pfe->setTitle($faker->title);
                $pfe->setStudent($faker->name);
                $pfe->setEntreprise($entreprise);
                $entreprise->addPFE($pfe);
                $manager->persist($pfe);
            }
            $manager->persist($entreprise);
        }
        $manager->flush();
    }
}
