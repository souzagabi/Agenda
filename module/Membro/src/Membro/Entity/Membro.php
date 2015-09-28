<?php

namespace Membro\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Membro
 *
 * @ORM\Table(name="ar_membro", indexes={@ORM\Index(name="FK_COMISSAO_1", columns={"COMISSAO_ID"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Membro\Entity\MembroRepository")
 */

class Membro {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="membro", type="text", length=65535, nullable=true)
     */
    protected $membro;
    
    /**
     *
     * @var string
     * 
     * @ORM\Column(name="cargo", type="text", length=65535, nullable=true) 
     */
    protected $cargo;
    
    /**
     * @var string
     *
     * @ORM\Column(name="data_inicio", type="string", length=10, nullable=true)
     */
    protected $dataInicio;
    
    /**
     * @var string
     *
     * @ORM\Column(name="data_fim", type="string", length=10, nullable=true)
     */
    protected $dataFim;
    
    /**
     * @var \Membro\Entity\Comissao
     *
     * @ORM\ManyToOne(targetEntity="Membro\Entity\Comissao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="COMISSAO", referencedColumnName="ID")
     * })
     */
    protected $comissao;

    /*
    public function __construct($options = array()) {
        (new ClassMethods())->hydrate($options, $this);
    }*/
    
    /**
     * Get Id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Get membro
     *
     * @return string 
     */
    public function getMembro() {
        return $this->membro;
    }

    
    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo() {
        return $this->cargo;
    }

    /**
     * Get data_inicio
     *
     * @return string 
     */
    public function getDataInicio() {
        return $this->dataInicio;
    }

    /**
     * Get data_fim
     *
     * @return string 
     */
    public function getDataFim() {
        return $this->dataFim;
    }

    /**
     * Get comissao
     *
     * @return \Membro\Entity\Comissao 
     */
    public function getComissao() {
        return $this->comissao;
    }

    /**
     * Set membro
     *
     * @param string $membro
     * @return Membro
     */
    public function setMembro($membro) {
        $this->membro = $membro;
        return $this;
    }

    /**
     * Set cargo
     *
     * @param string $cargo
     * @return Membro
     */
    public function setCargo($cargo) {
        $this->cargo = $cargo;
        return $this;
    }

    /**
     * Set data_inicio
     *
     * @param string $dataInicio
     * @return Membro
     */
    public function setDataInicio($dataInicio) {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    /**
     * Set data_fim
     *
     * @param string $dataFim
     * @return Membro
     */
    public function setDataFim($dataFim) {
        $this->dataFim = $dataFim;
        return $this;
    }

    /**
     * Set comissao
     *
     * @param \Membro\Entity\Comissao $comissao
     * @return Membro
     */
    public function setComissao($comissao) {
        $this->comissao = $comissao;

        return $this;
    }
    
      public function toArray() {
        return array(
            'id' => $this->id,
            'membro' => $this->membro,
            'cargo' => $this->cargo,
            'dataInicio' => $this->dataInicio,
            'dataFim' => $this->dataFim,
            'comissao' => $this->comissao->getId(),
        );
    }
    
    /**
     * 
     * @return type
     */
    public function __toString() {
        return $this->comissao;
    }
}
