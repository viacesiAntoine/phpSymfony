<?php

namespace App\DataFixtures;

use App\Entity\Magasin;
use App\Entity\Marque;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR'); // Instance Faker
        $apple= new Marque();
        $apple->setNom("Apple");
        $manager->persist($apple);

        $Samsung= new Marque();
        $Samsung->setNom("Samsung");
        $manager->persist($Samsung);

        $Microsoft= new Marque();
        $Microsoft->setNom("Microsoft");
        $manager->persist($Microsoft);

        $MarqueArray = [$apple,$Samsung,$Microsoft];

        for ($i = 0; $i < 100; $i++) {
            $produit = new Produit();
            $produit->setTitre($faker->randomElement($array = array ('Lave Vaisselle','Grille Pain','TV 110 Cm','Aspirateur','Ordinateur','Tablette','Smartphone','Cafetiere','Lave Linge','Robot Ménager' )))
                ->setCouleur($faker->numberBetween(1,10))
                ->setDescription($faker->sentence(20, true))
                ->setPoids($faker->randomFloat($nbMaxDecimals = 2, $min = 2, $max = 500))
                ->setPrixTTC($faker->randomNumber(4))
                ->setActif($faker->randomElement($array = array (true,false)))
                ->setStockQte($faker->randomNumber(2))
                ->setMarque($faker->randomElement($MarqueArray));
            $manager->persist($produit);
        }

        $magasin1 = new Magasin();
        $magasin1
            ->setNom("ipeufgu")
            ->setVille('Rouen');
        $manager->persist($magasin1);

        $magasin2 = new Magasin();
        $magasin2
            ->setNom("mqjksg")
            ->setVille('Le Havre');
        $manager->persist($magasin2);

        $magasin3 = new Magasin();
        $magasin3
            ->setNom("xsfbv")
            ->setVille('Tourville');
        $manager->persist($magasin3);

        $magasin4 = new Magasin();
        $magasin4
            ->setNom('zeyjrd')
            ->setVille('Caen');
        $manager->persist($magasin4);


        $manager->flush();
    }
}