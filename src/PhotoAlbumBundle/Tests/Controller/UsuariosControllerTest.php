<?php

namespace PhotoAlbumBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use PhotoAlbumBundle\Entity\usuario;

class UsuariosControllerTest extends WebTestCase
{
    public function crearUsuario($param) 
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/es/registro');
        
        $form=$crawler->selectButton('submit')->form();
        $form['form[nombre]']='Fulano';
        $form['form[password]']='1234';
        
        $crawler=$client->submit($form);
        
        $r=$this->getDoctrine()->getRepository('PhotoAlbumBundle:usuario');
        $usuario=$r->findByNombre('Fulano')[0];
        
        $this->assertEquals($usuario->getNombre(),'Fulano');
    }
}
