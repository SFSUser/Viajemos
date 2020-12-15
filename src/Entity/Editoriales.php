<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Editoriales
 *
 * @ORM\Table(name="editoriales")
 * @ORM\Entity
 */
class Editoriales
{
    public function __toString()
    {
        return $this->id . " - " . $this->nombre;
        // TODO: Implement __toString() method.
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="sede", type="string", length=45, nullable=false)
     */
    private $sede;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * @return string
     */
    public function getSede(): string
    {
        return $this->sede;
    }

    /**
     * @param string $sede
     */
    public function setSede(string $sede): void
    {
        $this->sede = $sede;
    }


}
