<?php

namespace App\DataFixtures;

use App\Entity\Benne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BenneFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<10; $i++ ) {
            $benne = new Benne();
            $benne->setIdentifiant("benne-".$i);
            $manager->persist($benne);
        }
        $manager->flush();
    }
}
