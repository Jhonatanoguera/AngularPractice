<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idioma
 *
 * @ORM\Table(name="idioma")
 * @ORM\Entity
 */
class Idioma
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Pelicula", mappedBy="audio_pelicula")
     */
    private $peliculas;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Pelicula", inversedBy="subtitulo_pelicula")
     * @ORM\JoinTable(name="idioma_pelicula",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idioma_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="pelicula_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $peliculas_sub;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->peliculas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->peliculas_sub = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Idioma
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
     * Add pelicula
     *
     * @param \AppBundle\Entity\Pelicula $pelicula
     *
     * @return Idioma
     */
    public function addPelicula(\AppBundle\Entity\Pelicula $pelicula)
    {
        $this->peliculas[] = $pelicula;

        return $this;
    }

    /**
     * Remove pelicula
     *
     * @param \AppBundle\Entity\Pelicula $pelicula
     */
    public function removePelicula(\AppBundle\Entity\Pelicula $pelicula)
    {
        $this->peliculas->removeElement($pelicula);
    }

    /**
     * Get peliculas
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeliculas()
    {
        return $this->peliculas;
    }

    /**
     * Add peliculasSub
     *
     * @param \AppBundle\Entity\Pelicula $peliculasSub
     *
     * @return Idioma
     */
    public function addPeliculasSub(\AppBundle\Entity\Pelicula $peliculasSub)
    {
        $this->peliculas_sub[] = $peliculasSub;

        return $this;
    }

    /**
     * Remove peliculasSub
     *
     * @param \AppBundle\Entity\Pelicula $peliculasSub
     */
    public function removePeliculasSub(\AppBundle\Entity\Pelicula $peliculasSub)
    {
        $this->peliculas_sub->removeElement($peliculasSub);
    }

    /**
     * Get peliculasSub
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPeliculasSub()
    {
        return $this->peliculas_sub;
    }
}

