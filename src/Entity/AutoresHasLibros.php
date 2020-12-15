<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AutoresHasLibros
 *
 * @ORM\Table(name="autores_has_libros", indexes={@ORM\Index(name="autores_has_libros_fk1", columns={"libros_ISBN"}), @ORM\Index(name="autores_has_libros_fk0", columns={"autores_id"})})
 * @ORM\Entity
 */
class AutoresHasLibros
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Autores
     *
     * @ORM\ManyToOne(targetEntity="Autores")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="autores_id", referencedColumnName="id")
     * })
     */
    private $autores;

    /**
     * @var \Libros
     *
     * @ORM\ManyToOne(targetEntity="Libros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="libros_ISBN", referencedColumnName="ISBN")
     * })
     */
    private $librosIsbn;


}
