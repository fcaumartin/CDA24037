<?php

namespace App\Tests;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EntitiesTest extends KernelTestCase
{
    public function testCountCategories(): void
    {
        $kernel = self::bootKernel();

        $em = $kernel->getContainer()->get('doctrine')->getManager();

        $repo = $em->getRepository(Categorie::class);

        $liste = $repo->findBy([ "parent" => null ]);
        

        $this->assertTrue(count($liste)===3);
    }

    public function testCountProducts(): void
    {
        $kernel = self::bootKernel();

        $em = $kernel->getContainer()->get('doctrine')->getManager();

        $repo = $em->getRepository(Categorie::class);

        $cat1 = $repo->findOneBy([ "nom" => "Guitares Electriques"]);

               

        $this->assertTrue(count($cat1->getProduits())===3);
    }
}
