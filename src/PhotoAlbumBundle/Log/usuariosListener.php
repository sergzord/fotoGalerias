<?php

namespace PhotoAlbumBundle\Log;
use Psr\Log\LoggerInterface;
use PhotoAlbumBundle\Log\usuariosEvent;

/**
 * Description of usuariosListener
 *
 * @author sergio
 */
class usuariosListener {
    
    private $logger;
    
    public function __construct(LoggerInterface $logger) {
        $this->logger=$logger;
    }
    
    public function registrarInsercion(usuariosEvent $ue)
    {
        $usuario=$ue->getUsuario();
        $this->logger->info('Insertado usuario '.$usuario->getNombre().' con id'.$usuario->getId());
    }
}
