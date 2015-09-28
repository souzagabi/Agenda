<?php

namespace Membro\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comissao
 *
 * @ORM\Table(name="ar_comissao")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Membro\Entity\ComissaoRepository")
 */
class Comissao extends AbstractEntity 
{

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="DESCRICAO", type="string", length=100, nullable=true)
     */
    protected $descricao;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return Comissao
     */
    public function setDescricao($descricao) {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao() {
        return $this->descricao;
    }

}
