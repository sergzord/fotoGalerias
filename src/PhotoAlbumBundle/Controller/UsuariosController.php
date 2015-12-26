<?php

namespace PhotoAlbumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PhotoAlbumBundle\Entity\usuario;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class UsuariosController extends Controller
{
    public function verUsuariosAction()
    {
       $em=$this->getDoctrine()->getRepository('PhotoAlbumBundle:usuario');
       $usuarios=$em->findAll();
       return $this->render('PhotoAlbumBundle:Default:usuarios.html.twig',array('usuarios'=>$usuarios)); 
    }
    
    public function crearAction(Request $request)
    {
        $usuario=new usuario();
        
        $form=$this->createFormBuilder($usuario)
                ->add('nombre',TextType::class)
                ->add('password',TextType::class)
                ->add('Guardar',SubmitType::class)
                ->getForm();
        
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em=$this->getDoctrine()->getEntityManager();
            $em->persist($usuario);
            $em->flush();
            
            return $this->redirectToRoute('verUsuarios');
        }
    
        return $this->render('PhotoAlbumBundle:Default:CrearUsuario.html.twig',array('form'=>$form->createView())); 
    }
    
    
}
