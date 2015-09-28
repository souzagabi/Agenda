<?php

namespace Pessoa\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
//use Zend\Stdlib\Hydrator;

/**
 * Classificacao
 *
 * @ORM\Table(name="ar_classificacao")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Pessoa\Entity\ClassificacaoRepository")
 */
class Classificacao extends AbstractEntity 
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
     * @ORM\Column(name="DESCRICAO", type="string", length=255, nullable=true)
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
     * @return Classificacao
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
