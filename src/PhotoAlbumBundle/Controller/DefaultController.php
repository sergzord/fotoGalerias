<?php

namespace PhotoAlbumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use PhotoAlbumBundle\Entity\usuario;
use PhotoAlbumBundle\Entity\album;
use PhotoAlbumBundle\Entity\foto;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $albums=$this->get('usuarios.ultimos')->obtenerUltimosUsuarios();
       
        return $this->render('PhotoAlbumBundle:Default:index.html.twig',array('albums'=>$albums));
    }
    
    public function createAction()
    {
        $usuario=new usuario();
        $usuario->setNombre('Sergio');
        $usuario->setPassword('7110eda4d09e062aa5e4a390b0a572ac0d2c0220');
        $usuario->setActivo(1);
        $usuario->setRol('ROLE_ADMIN');
        
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
    
    public function crearAction(Request $request) 
    {
        $album=new album();
        
        $em=$this->getDoctrine()->getRepository('PhotoAlbumBundle:usuario');
        $usuarios=$em->findAll();
        
        $form=$this->createFormBuilder($album)
                ->add('descripcion',TextType::class)
                ->add('usuario',ChoiceType::class, array(
                    'choices'  =>  $usuarios,
                    'choices_as_values' => true,
                    'choice_label' => function($usuario, $key, $index) {
                    return strtoupper($usuario->getNombre());
                    }
                ))
                ->add('Guardar',SubmitType::class)
                ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em=$this->getDoctrine()->getEntityManager();
            $em->persist($album);
            $em->flush();
            
            return $this->redirectToRoute('photo_album_homepage');
        }
    
        return $this->render('PhotoAlbumBundle:Default:CrearAlbum.html.twig',array('form'=>$form->createView()));
    }
    
}
