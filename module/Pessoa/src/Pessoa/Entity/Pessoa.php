<?php

namespace Pessoa\Entity;

use Base\Entity\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;
use Zend\Stdlib\Hydrator;

/**
 * Pessoa
 *
 * @ORM\Table(name="ar_pessoa", indexes={@ORM\Index(name="FK_CLASSIFICACAO_1", columns={"CLASSIFICATION_ID"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Pessoa\Entity\PessoaRepository")
 */
class Pessoa extends AbstractEntity 
{

    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $Id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOME", type="string", length=255, nullable=true)
     */
    protected $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="DATA_ADMISSAO", type="string", length=15, nullable=false)
     */
    protected $dataAdmissao;

    /**
     * @var string
     *
     * @ORM\Column(name="ENDERECO_RESIDENCIAL", type="string", length=255, nullable=false)
     */
    protected $enderecoResidencial;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEFONE_RESIDENCIAL", type="string", length=15, nullable=false)
     */
    protected $telefoneResidencial;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL_PESSOAL", type="string", length=255, nullable=false)
     */
    protected $emailPessoal;

    /**
     * @var string
     *
     * @ORM\Column(name="CELULAR", type="string", length=15, nullable=false)
     */
    protected $celular;

    /**
     * @var string
     *
     * @ORM\Column(name="ENDERECO_COMERCIAL", type="string", length=255, nullable=false)
     */
    protected $enderecoComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="TELEFONE_COMERCIAL", type="string", length=15, nullable=false)
     */
    protected $telefoneComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL_COMERCIAL", type="string", length=255, nullable=false)
     */
    protected $emailComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="CONJUGE", type="string", length=100, nullable=false)
     */
    protected $conjuge;

    /**
     * @var string
     *
     * @ORM\Column(name="CELULAR_CONJUGE", type="string", length=15, nullable=false)
     */
    protected $celularConjuge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATA_CADASTRO", type="datetime", nullable=true)
     */
    protected $dataCadastro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATA_ALTERACAO", type="datetime", nullable=false)
     */
    protected $dataAlteracao;

    /**
     *
     * @var blob 
     * @ORM\Column(name="IMAGEM", type="blob", nullable=true)
     */
    protected $imagem;
    
	/**
     * @var string
     *
     * @ORM\Column(name="NOME_IMAGEM", type="string", length=50, nullable=false)
     */
    private $nomeImagem;

    /**
     * @var integer
     *
     * @ORM\Column(name="TAMANHO_IMAGEM", type="integer", nullable=false)
     */
    private $tamanhoImagem;

    /**
     * @var string
     *
     * @ORM\Column(name="TIPO_IMAGEM", type="string", length=255, nullable=true)
     */
    private $tipoImagem;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="ATIVO", type="smallint", nullable=true)
     */
    protected $ativo;

    /**
     * @var \Pessoa\Entity\Classificacao
     *
     * @ORM\ManyToOne(targetEntity="Pessoa\Entity\Classificacao")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CLASSIFICATION_ID", referencedColumnName="ID")
     * })
     */
    protected $classification;

    /**
     * Get Id
     *
     * @return integer 
     */
    public function getId() {
        return $this->Id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Pessoa
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
     * Set dtAdmissao
     *
     * @param string $dataAdmissao
     * @return Pessoa
     */
    public function setDataAdmissao($dataAdmissao) {
        $this->dataAdmissao = $dataAdmissao;

        return $this;
    }

    /**
     * Get dtAdmissao
     *
     * @return string 
     */
    public function getDataAdmissao() {
        return $this->dataAdmissao;
    }

    /**
     * Set endRes
     *
     * @param string $enderecoResidencial
     * @return Pessoa
     */
    public function setEnderecoResidencial($enderecoResidencial) {
        $this->enderecoResidencial = $enderecoResidencial;

        return $this;
    }

    /**
     * Get endRes
     *
     * @return string 
     */
    public function getEnderecoResidencial() {
        return $this->enderecoResidencial;
    }

    /**
     * Set telRes
     *
     * @param string $telefoneResidencial
     * @return Pessoa
     */
    public function setTelefoneResidencial($telefoneResidencial) {
        $this->telefoneResidencial = $telefoneResidencial;

        return $this;
    }

    /**
     * Get telRes
     *
     * @return string 
     */
    public function getTelefoneResidencial() {
        return $this->telefoneResidencial;
    }

    /**
     * Set emailPes
     *
     * @param string $emailPessoal
     * @return Pessoa
     */
    public function setEmailPessoal($emailPessoal) {
        $this->emailPessoal = $emailPessoal;

        return $this;
    }

    /**
     * Get emailPes
     *
     * @return string 
     */
    public function getEmailPessoal() {
        return $this->emailPessoal;
    }

    /**
     * Set celular
     *
     * @param string $celular
     * @return Pessoa
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
     * Set endCom
     *
     * @param string $enderecoComercial
     * @return Pessoa
     */
    public function setEnderecoComercial($enderecoComercial) {
        $this->enderecoComercial = $enderecoComercial;

        return $this;
    }

    /**
     * Get endCom
     *
     * @return string 
     */
    public function getEnderecoComercial() {
        return $this->enderecoComercial;
    }

    /**
     * Set telCom
     *
     * @param string $telefoneComercial
     * @return Pessoa
     */
    public function setTelefoneComercial($telefoneComercial) {
        $this->telefoneComercial = $telefoneComercial;

        return $this;
    }

    /**
     * Get telCom
     *
     * @return string 
     */
    public function getTelefoneComercial() {
        return $this->telefoneComercial;
    }

    /**
     * Set emailCom
     *
     * @param string $emailComercial
     * @return Pessoa
     */
    public function setEmailComercial($emailComercial) {
        $this->emailComercial = $emailComercial;

        return $this;
    }

    /**
     * Get emailCom
     *
     * @return string 
     */
    public function getEmailComercial() {
        return $this->emailComercial;
    }

    /**
     * Set conjuge
     *
     * @param string $conjuge
     * @return Pessoa
     */
    public function setConjuge($conjuge) {
        $this->conjuge = $conjuge;

        return $this;
    }

    /**
     * Get conjuge
     *
     * @return string 
     */
    public function getConjuge() {
        return $this->conjuge;
    }

    /**
     * Set celularConjuge
     *
     * @param string $celularConjuge
     * @return Pessoa
     */
    public function setCelularConjuge($celularConjuge) {
        $this->celularConjuge = $celularConjuge;

        return $this;
    }

    /**
     * Get celularConjuge
     *
     * @return string 
     */
    public function getCelularConjuge() {
        return $this->celularConjuge;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     * @ORM\PrePersist
     * @return Pessoa
     */
    public function setDataCadastro() {
        $this->dataCadastro = new \DateTime('now');

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime 
     */
    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    /**
     * Set dataAlteracao
     *
     * @param \DateTime $dataAlteracao
     * @ORM\PostUpdate
     * @return Pessoa
     */
    public function setDataAlteracao() {
        $this->dataAlteracao = new \DateTime('now');

        return $this;
    }

    /**
     * Get dataAlteracao
     *
     * @return \DateTime 
     */
    public function getDataAlteracao() {
        return $this->dataAlteracao;
    }

    /**
     * 
     * @return type
     */
    public function getImagem() {
        return $this->imagem;
    }

    /**
     * 
     * @param type imagem
     * @return \Pessoa\Entity\Pessoa
     */
    public function setImagem($imagem) {
        $this->imagem = imagem;
        return $this;
    }
	
	/**
     * Set nomeImagem
     *
     * @param string $nomeImagem
     * @return Pessoa
     */
    public function setNomeImagem($nomeImagem)
    {
        $this->nomeImagem = $nomeImagem;
    
        return $this;
    }

    /**
     * Get nomeImagem
     *
     * @return string 
     */
    public function getNomeImagem()
    {
        return $this->nomeImagem;
    }

    /**
     * Set tamanhoImagem
     *
     * @param integer $tamanhoImagem
     * @return Pessoa
     */
    public function setTamanhoImagem($tamanhoImagem)
    {
        $this->tamanhoImagem = $tamanhoImagem;
    
        return $this;
    }

    /**
     * Get tamanhoImagem
     *
     * @return integer 
     */
    public function getTamanhoImagem()
    {
        return $this->tamanhoImagem;
    }

    /**
     * Set tipoImagem
     *
     * @param string $tipoImagem
     * @return Pessoa
     */
    public function setTipoImagem($tipoImagem)
    {
        $this->tipoImagem = $tipoImagem;
    
        return $this;
    }

    /**
     * Get tipoImagem
     *
     * @return string 
     */
    public function getTipoImagem()
    {
        return $this->tipoImagem;
    }
	

        /**
     * Set ativo
     *
     * @param integer $ativo
     * @return Pessoa
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
     * Set classification
     *
     * @param \Pessoa\Entity\Classificacao $classification
     * @return Pessoa
     */
    public function setClassification($classification) {
        $this->classification = $classification;

        return $this;
    }

    /**
     * Get classification
     *
     * @return \Pessoa\Entity\Classificacao 
     */
    public function getClassification() {
        return $this->classification;
    }
}
