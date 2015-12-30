<?php

namespace PhotoAlbumBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PhotoAlbumBundle\Entity\album;
use PhotoAlbumBundle\Entity\usuario;

class albumTest extends WebTestCase
{
    public function testCrear()
    {
        $r=$this->getDoctrine()->getRepository('PhotoAlbumBundle:usuario');
        $usuario=$r->findById(1)[0];
        
        $album=new album();
        $album->setDescripcion('Album de prueba');
        $album->setUsuario($usuario);
        
        $em=$this->getDoctrine()->getEntityManager();
        $em->persist($album);
        $em->flush();
        
        $r=$this->getDoctrine()->getRepository('PhotoAlbumBundle:album');
        $album=$r->findByDescripcion('Album de prueba')[0];
        
        $nombre=$album->getUsuario()->getNombre();
        $this->assertEquals($nombre,'sergio');
        
    }
}
