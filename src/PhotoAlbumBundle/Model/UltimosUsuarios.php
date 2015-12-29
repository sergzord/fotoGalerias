<?php

namespace PhotoAlbumBundle\Model;

use Doctrine\Common\Persistence\ObjectManager;

/**
 * Description of UltimosUsuarios
 *
 * @author Sergio
 */
class UltimosUsuarios 
{
    private $manager;
    
    public function __construct(ObjectManager $om) 
    {
        $this->manager=$om->getRepository('PhotoAlbumBundle:album');
    }
    public function obtenerUltimosUsuarios()
    {
        $albums=$this->manager->findAll();
        return $albums;
    }
}
