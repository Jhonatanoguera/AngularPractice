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
     * @ORM\Column(name="nombre", type="string", length=255, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen", type="text", precision=0, scale=0, nullable=false, unique=false)
     */
    private $resumen;

    /**
     * @var string
     *
     * @ORM\Column(name="url_taller", type="string", length=510, precision=0, scale=0, nullable=false, unique=false)
     */
    private $url_taller;

    /**
     * @var \AppBundle\Entity\Pais
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Pais", inversedBy="peliculas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_id", referencedColumnName="id")
     * })
     */
    private $pais;

    /**
     * @var \AppBundle\Entity\Categoria
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Categoria", inversedBy="peliculas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorias_id", referencedColumnName="id")
     * })
     */
    private $categorias;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Actor", mappedBy="peliculas")
     */
    private $actores;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Idioma", inversedBy="peliculas")
     * @ORM\JoinTable(name="pelicula_idioma",
     *   joinColumns={
     *     @ORM\JoinColumn(name="pelicula_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idioma_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $audio_pelicula;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Idioma", mappedBy="peliculas_sub")
     */
    private $subtitulo_pelicula;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->actores = new \Doctrine\Common\Collections\ArrayCollection();
        $this->audio_pelicula = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subtitulo_pelicula = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set pais
     *
     * @param \AppBundle\Entity\Pais $pais
     *
     * @return Pelicula
     */
    public function setPais(\AppBundle\Entity\Pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \AppBundle\Entity\Pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set categorias
     *
     * @param \AppBundle\Entity\Categoria $categorias
     *
     * @return Pelicula
     */
    public function setCategorias(\AppBundle\Entity\Categoria $categorias = null)
    {
        $this->categorias = $categorias;

        return $this;
    }

    /**
     * Get categorias
     *
     * @return \AppBundle\Entity\Categoria
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * Add actore
     *
     * @param \AppBundle\Entity\Actor $actore
     *
     * @return Pelicula
     */
    public function addActore(\AppBundle\Entity\Actor $actore)
    {
        $this->actores[] = $actore;

        return $this;
    }

    /**
     * Remove actore
     *
     * @param \AppBundle\Entity\Actor $actore
     */
    public function removeActore(\AppBundle\Entity\Actor $actore)
    {
        $this->actores->removeElement($actore);
    }

    /**
     * Get actores
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActores()
    {
        return $this->actores;
    }

    /**
     * Add audioPelicula
     *
     * @param \AppBundle\Entity\Idioma $audioPelicula
     *
     * @return Pelicula
     */
    public function addAudioPelicula(\AppBundle\Entity\Idioma $audioPelicula)
    {
        $this->audio_pelicula[] = $audioPelicula;

        return $this;
    }

    /**
     * Remove audioPelicula
     *
     * @param \AppBundle\Entity\Idioma $audioPelicula
     */
    public function removeAudioPelicula(\AppBundle\Entity\Idioma $audioPelicula)
    {
        $this->audio_pelicula->removeElement($audioPelicula);
    }

    /**
     * Get audioPelicula
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAudioPelicula()
    {
        return $this->audio_pelicula;
    }

    /**
     * Add subtituloPelicula
     *
     * @param \AppBundle\Entity\Idioma $subtituloPelicula
     *
     * @return Pelicula
     */
    public function addSubtituloPelicula(\AppBundle\Entity\Idioma $subtituloPelicula)
    {
        $this->subtitulo_pelicula[] = $subtituloPelicula;

        return $this;
    }

    /**
     * Remove subtituloPelicula
     *
     * @param \AppBundle\Entity\Idioma $subtituloPelicula
     */
    public function removeSubtituloPelicula(\AppBundle\Entity\Idioma $subtituloPelicula)
    {
        $this->subtitulo_pelicula->removeElement($subtituloPelicula);
    }

    /**
     * Get subtituloPelicula
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubtituloPelicula()
    {
        return $this->subtitulo_pelicula;
    }
}

