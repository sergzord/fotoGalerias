<?php

namespace PhotoAlbumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PhotoAlbumBundle\Entity\usuario;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcher;
use PhotoAlbumBundle\Log\usuariosEvent;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
            
            $dispatcher=new EventDispatcher();
            $ue=new usuariosEvent($usuario);
            $dispatcher->dispatch('usuarios.crear',$ue);
            
            return $this->redirectToRoute('verUsuarios');
        }
    
        return $this->render('PhotoAlbumBundle:Default:CrearUsuario.html.twig',array('form'=>$form->createView())); 
    }
    
    public function altaUsuarioAction(Request $request)
    {
        $usuario=new usuario();
        $form=$this->createFormBuilder($usuario)
                ->add('nombre',TextType::class)
                ->add('password',TextType::class)
                ->add('Guardar',SubmitType::class)
                ->getForm();
        
        $form->handleRequest($request);
        
        $usuario->setActivo(0);
        $usuario->setRol('ROLE_USER');
        $pass=  sha1($usuario->getPassword());
        $usuario->setPassword($pass);
        
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em=$this->getDoctrine()->getEntityManager();
            $em->persist($usuario);
            $em->flush();
            
            return $this->redirectToRoute('login_route');
        }
    
        return $this->render('PhotoAlbumBundle:Default:registro.html.twig',array('form'=>$form->createView()));
    }
    
    public function editarUsuarioAction(Request $request)
    {
        $r=$this->getDoctrine()->getRepository('PhotoAlbumBundle:usuario');
        $usuario=$r->findById($request->get('id'))[0];

        $form=$this->createFormBuilder($usuario)
                ->add('nombre',TextType::class)
                ->add('password',TextType::class)
                ->add('rol',ChoiceType::class, array(
                    'choices'  =>  array('Usuario'=>'ROLE_USER','Admin'=>'ROLE_ADMIN'),
                    'choices_as_values' => true))
                ->add('activo',ChoiceType::class, array(
                    'choices'  =>  array('Sí'=>'1','No'=>'0'),
                    'choices_as_values' => true))
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
    
        return $this->render('PhotoAlbumBundle:Default:EditarUsuario.html.twig',array('form'=>$form->createView()));
    }
}
