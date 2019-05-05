<?php

namespace App\DataFixtures;

use App\Security\User\Infrastructure\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
        
        }

        $manager->flush();
    }
    
    protected function getUsers(): array
    {
        
        $user = new User();
    }
}
