<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PhotoAlbumBundle\Entity\usuario;

class cargaDatos implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $usuario=new usuario();
        $usuario->setNombre('Sergio');
        $usuario->setPassword('1234');
        
        $manager->persist($usuario);
        $manager->flush();
    }
}