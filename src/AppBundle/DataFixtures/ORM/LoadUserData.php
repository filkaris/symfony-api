<?php


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setUsername('petros');
        $userAdmin->setFullName('Petros Ziogas');
        $dt = new \DateTime('01/01/2017');
        $userAdmin->setDateOfBirth( $dt );
        $userAdmin->setApiKey('97b078820e202aefe8b633490b9b8c9161263ef2');
        $manager->persist($userAdmin);

        $userAdmin = new User();
        $userAdmin->setUsername('alexander');
        $userAdmin->setFullName('Alexander Caravitis');
        $userAdmin->setDateOfBirth( $dt );
        $userAdmin->setApiKey('2a69717c3d9e7167bca2d111905f20c443b9a957');
        $manager->persist($userAdmin);

        $manager->flush();
    }
}
