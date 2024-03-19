<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Client();

        $c1
            ->setNom("toto")
            ->setPrenom("titi");

        $manager->persist($c1);

        $manager->flush();
    }
}
