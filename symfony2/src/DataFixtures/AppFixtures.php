<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $c1 = new Categorie();

        $c1->setNom("Guitares")
        ->setImage("");

        $c2 = new Categorie();

        $c2->setNom("Claviers")
        ->setImage("");

        $c3 = new Categorie();

        $c3->setNom("Percussions")
        ->setImage("");
        

        $manager->persist($c1);
        $manager->persist($c2);
        $manager->persist($c3);

        $sc1 = new Categorie();

        $sc1->setNom("Guitares Electriques")
        ->setImage("")
        ->setParent($c1);

        $sc2 = new Categorie();

        $sc2->setNom("Guitares à piles")
        ->setImage("")
        ->setParent($c1);

        $sc3 = new Categorie();

        $sc3->setNom("Guitares Electro")
        ->setImage("")
        ->setParent($c1);

        $manager->persist($sc1);
        $manager->persist($sc2);
        $manager->persist($sc3);

        $p1 = new Produit();

        $p1->setNom("Guitare 1")
        ->setImage("")
        ->setPrix(1200)
        ->setCategorie($sc1);

        $p2 = new Produit();

        $p2->setNom("Guitare 2")
        ->setImage("")
        ->setPrix(1200)
        ->setCategorie($sc1);

        $p3 = new Produit();

        $p3->setNom("Guitare 3")
        ->setImage("")
        ->setPrix(1200)
        ->setCategorie($sc1);

        $manager->persist($p1);
        $manager->persist($p2);
        $manager->persist($p3);


        $manager->flush();
    }
}
