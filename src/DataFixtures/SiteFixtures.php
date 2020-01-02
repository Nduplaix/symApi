<?php

namespace App\DataFixtures;

use App\Entity\Site;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SiteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $site = new Site();
        $site->setLabel('Renarou')
            ->addUser($manager->getRepository(User::class)->findOneBy(['email' => 'nduplaix62@gmail.com']));
        $manager->persist($site);

        $site = new Site();
        $site->setLabel('QRBenne')
            ->addUser($manager->getRepository(User::class)->findOneBy(['email' => 'nduplaix62@gmail.com']));
        $manager->persist($site);

        $site = new Site();
        $site->setLabel('AG-Renvation')
            ->addUser($manager->getRepository(User::class)->findOneBy(['email' => 'nduplaix62@gmail.com']));
        $manager->persist($site);

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }
}
