<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR'); // Instance Faker

        for ($i = 0; $i < 100; $i++) {
            $produit = new Produit();
            $produit->setTitre($faker->randomElement($array = array ('Lave Vaisselle','Grille Pain','TV 110 Cm','Aspirateur','Ordinateur','Tablette','Smartphone','Cafetiere','Lave Linge','Robot Ménager' )))
                ->setCouleur($faker->numberBetween(1,10))
                ->setDescription($faker->sentence(20, true))
                ->setPoids($faker->randomFloat($nbMaxDecimals = 2, $min = 2, $max = 500))
                ->setPrixTTC($faker->randomNumber(4))
                ->setActif($faker->randomElement($array = array (true,false)))
                ->setStockQte($faker->randomNumber(2));
            $manager->persist($produit);
        }
        $manager->flush();

    }
}