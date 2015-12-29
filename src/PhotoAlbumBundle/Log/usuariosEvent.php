<?php

namespace PhotoAlbumBundle\Log;
use Symfony\Component\EventDispatcher\Event;
use PhotoAlbumBundle\Entity\usuario;

/**
 * Description of usuariosEvent
 *
 * @author sergio
 */
class usuariosEvent extends Event
{
   private $usuario;
    
   public function __construct(usuario $u) {
       $this->usuario=$u;
   }
   
   public function getUsuario() 
   {
       return $this->usuario;
   }
}
