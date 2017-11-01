<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pelicula
 *
 * @ORM\Table(name="pelicula")
 * @ORM\Entity
 */
class Pelicula
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen", type="text", nullable=false, unique=false)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="url_taller", type="string", length=510, nullable=false, unique=false)
     */
    private $url_taller;


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
     * @return Pelicula
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
     * Set resumen
     *
     * @param string $resumen
     *
     * @return Pelicula
     */
    public function setResumen($resumen)
    {
        $this->resumen = $resumen;

        return $this;
    }

    /**
     * Get resumen
     *
     * @return string
     */
    public function getResumen()
    {
        return $this->resumen;
    }

    /**
     * Set urlTaller
     *
     * @param string $urlTaller
     *
     * @return Pelicula
     */
    public function setUrlTaller($urlTaller)
    {
        $this->url_taller = $urlTaller;

        return $this;
    }

    /**
     * Get urlTaller
     *
     * @return string
     */
    public function getUrlTaller()
    {
        return $this->url_taller;
    }
}

