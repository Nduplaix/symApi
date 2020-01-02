<?php

namespace App\DataFixtures;

use App\Entity\AGProject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AGRenovationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $project = new AGProject();
            $project->setCity($faker->city)
                ->setDescription($faker->text)
                ->setShortDescription($faker->text)
                ->setLabel($faker->sentence)
                ->setIsInProgress($faker->boolean);

            if ($faker->boolean) {
                $project->setImages([
                    [
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],
                ]);
            } else {
                $project->setImages([
                    'http://placehold.it/200x100?text=FULL',
                    [
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],[
                        'before' => 'http://placehold.it/200x100?text=Before',
                        'after' => 'http://placehold.it/200x100?text=After',
                    ],
                ]);
            }

            $manager->persist($project);
        }

        $manager->flush();
    }
}
