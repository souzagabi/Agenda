<?php

namespace Pessoa\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tesouraria
 *
 * @ORM\Table(name="ar_tesouraria", indexes={@ORM\Index(name="PESSOA_ID", columns={"PESSOA_ID"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Pessoa\Entity\TesourariaRepository")
 */
class Tesouraria extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATA", type="datetime", nullable=true)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="CREDITO", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $credito;

    /**
     * @var string
     *
     * @ORM\Column(name="DEBITO", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $debito;

    /**
     * @var \Pessoa\Entity\Pessoa
     *
     * @ORM\ManyToOne(targetEntity="Pessoa\Entity\Pessoa")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="PESSOA_ID", referencedColumnName="ID")
     * })
     */
    private $pessoa;



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
     * Set data
     *
     * @param \DateTime $data
     * @ORM\PrePersist
     * @return Tesouraria
     */
    public function setData() {
        $this->data = new \DateTime('now');

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set credito
     *
     * @param string $credito
     * @return Tesouraria
     */
    public function setCredito($credito)
    {
        $this->credito = $credito;
    
        return $this;
    }

    /**
     * Get credito
     *
     * @return string 
     */
    public function getCredito()
    {
        return $this->credito;
    }

    /**
     * Set debito
     *
     * @param string $debito
     * @return Tesouraria
     */
    public function setDebito($debito)
    {
        $this->debito = $debito;
    
        return $this;
    }

    /**
     * Get debito
     *
     * @return string 
     */
    public function getDebito()
    {
        return $this->debito;
    }

    /**
     * Set pessoa
     *
     * @param \Pessoa\Entity\Pessoa $pessoa
     * @return Tesouraria
     */
    public function setPessoa($pessoa = null)
    {
        $this->pessoa = $pessoa;
    
        return $this;
    }

    /**
     * Get pessoa
     *
     * @return \Pessoa\Entity\Pessoa 
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }
}
