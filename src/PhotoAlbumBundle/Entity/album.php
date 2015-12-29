<?php

namespace PhotoAlbumBundle\Entity;
use PhotoAlbumBundle\Entity\usuario;

/**
 * Description of album
 *
 * @author Sergio
 */
class album {
    private $id;
    private $descripcion;
    private $usuario;
    
    public function __construct($descripcion='', usuario $usuario=null) {
        $this->descripcion=$descripcion;
        $this->usuario=$usuario;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return album
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return album
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set usuario
     *
     * @param \PhotoAlbumBundle\Entity\usuario $usuario
     *
     * @return album
     */
    public function setUsuario(\PhotoAlbumBundle\Entity\usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \PhotoAlbumBundle\Entity\usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return album
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }
}
