<?php

namespace PhotoAlbumBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Description of usuario
 *
 * @author Sergio
 */
class usuario implements UserInterface,  \Serializable
{
    private $id;
    private $nombre;
    private $password;
    private $rol;
    private $activo;
    
    public function __construct($nombre='',$password='') {
        $this->nombre=$nombre;
        $this->password=$password;
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
     * @return usuario
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
     * @return usuario
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
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $usuario;


    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return usuario
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

    /**
     * Set usuario
     *
     * @param string $usuario
     *
     * @return usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return array($this->getRol());
    }

    public function getSalt() {
        return null;
    }

    public function getUsername() {
        return $this->getNombre();
    }


    /**
     * Set activo
     *
     * @param \int $activo
     *
     * @return usuario
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return \int
     */
    public function getActivo()
    {
        return $this->activo;
    }

    public function serialize() {
         return serialize(array(
            $this->id,
            $this->nombre,
            $this->password,
        ));
    }

    public function unserialize($serialized) {
        list (
            $this->id,
            $this->nombre,
            $this->password,
        ) = unserialize($serialized);
    }


    /**
     * Set rol
     *
     * @param string $rol
     *
     * @return usuario
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return string
     */
    public function getRol()
    {
        return $this->rol;
    }
}
