<?php
namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Product;
use App\Entity\User;
use App\Entity\Category;

class Base extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $category1 = new Category();
        $category1->setName('Service');
        $manager->persist($category1);

        $product1 = new Product();
        $product1->setName('Création de site Web');
        $product1->setType($category1);
        $product1->setDescription('Nous créons enssemble votre site Web');
        $product1->setPrice(50);
        $product1->setRate(2.0);
        $product1->setViewCounter(0);
        $manager->persist($product1);


        $product2 = new Product();
        $product2->setName('Administration Parc Réseau');
        $product2->setType($category1);
        $product2->setDescription('Je veille au bon fonctionnement du réseau de votre entreprise');
        $product2->setPrice(50);
        $product2->setRate(4.0);
        $product2->setViewCounter(0);
        $manager->persist($product2);


        $product3 = new Product();
        $product3->setName('Cours');
        $product3->setType($category1);
        $product3->setDescription('Je vous aide à mieux vous servir de vos appareils informatique');
        $product3->setPrice(30);
        $product3->setRate(5.0);
        $product3->setViewCounter(0);
        $manager->persist($product3);


        $user1 = new User();
        $user1->setEmail('a@a.com');
        $user1->setPassword('tour');
        $user1->setFirstName('root');
        $user1->setLastName('root');
        $manager->persist($user1);


        $manager->flush();
    }
}
