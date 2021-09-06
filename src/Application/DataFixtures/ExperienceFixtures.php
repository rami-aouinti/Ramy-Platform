<?php

namespace App\Application\DataFixtures;

use App\Application\Entity\Experience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

/**
 * Class PostFixtures
 * @package App\Application\DataFixtures
 */
class ExperienceFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 100; $i++) {
            $post = new Experience();
            $post->setTitle("Experience N°" . $i);
            $post->setContent("Contenu N°" . $i);
            $post->setUser($this->getReference(sprintf("user-%d", ($i % 10) + 1)));
            $post->setImage(" https://picsum.photos/400/300");
            $manager->persist($post);

        }

        $manager->flush();
    }

    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [UserFixtures::class];
    }
}
