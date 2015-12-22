<?php


namespace PhotoAlbumBundle\Entity;

/**
 * Description of foto
 *
 * @author sergio
 */
class foto {
    private $id;
    private $descripcion;
    private $ruta;
    private $album;

    public function __construct($descripcion,$ruta,$album) {
        $this->descripcion=$descripcion;
        $this->ruta=$ruta;
        $this->album=$album;
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return foto
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
     * Set ruta
     *
     * @param string $ruta
     *
     * @return foto
     */
    public function setRuta($ruta)
    {
        $this->ruta = $ruta;

        return $this;
    }

    /**
     * Get ruta
     *
     * @return string
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * Set album
     *
     * @param \PhotoAlbumBundle\Entity\album $album
     *
     * @return foto
     */
    public function setAlbum(\PhotoAlbumBundle\Entity\album $album = null)
    {
        $this->album = $album;

        return $this;
    }

    /**
     * Get album
     *
     * @return \PhotoAlbumBundle\Entity\album
     */
    public function getAlbum()
    {
        return $this->album;
    }
}
