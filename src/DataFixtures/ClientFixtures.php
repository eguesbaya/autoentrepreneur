<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker;
use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ClientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        
        for ($i = 0; $i < 20; $i++) {
        $client = new Client();
        $client->setName('client '.$i);
        $client->setType("undefined type");
        $client->setComment($faker->paragraph()); 
    
        $manager->persist($client);
        }

        $manager->flush();
    }
}
