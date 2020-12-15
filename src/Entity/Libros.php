<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Libros
 *
 * @ORM\Table(name="libros", indexes={@ORM\Index(name="libros_fk0", columns={"editoriales_id"})})
 * @ORM\Entity
 */
class Libros
{
    /**
     * @var int
     *
     * @ORM\Column(name="ISBN", type="integer", nullable=false)
     * @ORM\Id
     */
    private $isbn;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=45, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="sinopsis", type="text", length=65535, nullable=false)
     */
    private $sinopsis;

    /**
     * @var string
     *
     * @ORM\Column(name="n_paginas", type="string", length=45, nullable=false)
     */
    private $nPaginas;

    /**
     * @var \Editoriales
     *
     * @ORM\ManyToOne(targetEntity="Editoriales")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="editoriales_id", referencedColumnName="id")
     * })
     */
    private $editoriales;

    /**
     * @return int
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    public function setIsbn($i){
        $this->isbn = $i;
    }


    /**
     * @return string
     */
    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getSinopsis(): string
    {
        return $this->sinopsis;
    }

    /**
     * @param string $sinopsis
     */
    public function setSinopsis(string $sinopsis): void
    {
        $this->sinopsis = $sinopsis;
    }

    /**
     * @return string
     */
    public function getNPaginas(): string
    {
        return $this->nPaginas;
    }

    /**
     * @param string $nPaginas
     */
    public function setNPaginas(string $nPaginas): void
    {
        $this->nPaginas = $nPaginas;
    }

    /**
     * @return \Editoriales
     */
    public function getEditoriales()
    {
        return $this->editoriales;
    }

    public function setEditoriales($e){
        $this->editoriales = $e;
    }
}
