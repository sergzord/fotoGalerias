<?php

namespace PhotoAlbumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PhotoAlbumBundle\Entity\usuario;
use PhotoAlbumBundle\Entity\album;
use PhotoAlbumBundle\Entity\foto;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em=$this->getDoctrine()->getRepository('PhotoAlbumBundle:album');
        $albums=$em->findAll();
        return $this->render('PhotoAlbumBundle:Default:index.html.twig',array('albums'=>$albums));
    }
    
    public function verUsuariosAction()
    {
       $em=$this->getDoctrine()->getRepository('PhotoAlbumBundle:usuario');
       $usuarios=$em->findAll();
       return $this->render('PhotoAlbumBundle:Default:usuarios.html.twig',array('usuarios'=>$usuarios)); 
    }
    
    public function createAction()
    {
        $usuario=new usuario();
        $usuario->setNombre('Sergio');
        $usuario->setPassword('1234');
        
        $em=$this->getDoctrine()->getManager();
        $em->persist($usuario);
        
        $album=new album('Album De Fotos Sergio', $usuario);
        $em->persist($album);
        $album2=new album('Album De Fotos Sergio 2', $usuario);
        $em->persist($album2);
        
        $foto=new foto('foto 1', 'madoz1.jpg', $album);
        $em->persist($foto);
        
        $foto2=new foto('foto 2', 'madoz2.jpg', $album);
        $em->persist($foto2);

        $em->flush();
        
        return $this->render('PhotoAlbumBundle:Default:cargaDatos.html.twig');
    }
    
}
