<?php

namespace Pessoa\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Filho
 *
 * @ORM\Table(name="ar_filho", indexes={@ORM\Index(name="FK_PESSOA_1", columns={"PESSOA_ID"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Pessoa\Entity\FilhoRepository")
 */
class Filho extends AbstractEntity 
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
     * @ORM\Column(name="NOME", type="string", length=255, nullable=false)
     */
    protected $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="celular", type="string", length=15, nullable=true)
     */
    protected $celular;

    /**
     * @var integer
     *
     * @ORM\Column(name="ATIVO", type="smallint", nullable=true)
     */
    protected $ativo;

    /**
     * @var \Pessoa\Entity\Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Pessoa\Entity\Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PESSOA_ID", referencedColumnName="ID")
     * })
     */
    protected $pessoa;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Filho
     */
    public function setNome($nome) {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Filho
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Filho
     */
    public function setCelular($celular) {
        $this->celular = $celular;

        return $this;
    }

    /**
     * Get celular
     *
     * @return string 
     */
    public function getCelular() {
        return $this->celular;
    }

    /**
     * Set ativo
     *
     * @param integer $ativo
     * @return Filho
     */
    public function setAtivo($ativo) {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return integer 
     */
    public function getAtivo() {
        return $this->ativo;
    }

    /**
     * Set pessoa
     *
     * @param \Pessoa\Entity\Pessoa $pessoa
     * @return Filho
     */
    public function setPessoa($pessoa) {
        $this->pessoa = $pessoa;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Pessoa\Entity\Pessoa 
     */
    public function getPessoa() {
        return $this->pessoa;
    }

}
