<?php

namespace Classificacao\Entity;

use Doctrine\ORM\Mapping as ORM;
use Base\Entity\AbstractEntity;

/**
 * Reuniao
 *
 * @ORM\Table(name="ar_reuniao")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Classificacao\Entity\ReuniaoRepository")
 */
class Reuniao extends AbstractEntity {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="data_evento", type="string", nullable=false)
     */
    private $dataEvento;

    /**
     * @var string
     *
     * @ORM\Column(name="eventos", type="string", length=255, nullable=false)
     */
    private $eventos;

    /**
     * @var string
     *
     * @ORM\Column(name="pauta", type="string", length=255, nullable=true)
     */
    private $pauta;

    /**
     * @var string
     *
     * @ORM\Column(name="cardapio", type="string", length=255, nullable=true)
     */
    private $cardapio;

    /**
     * @var string
     *
     * @ORM\Column(name="lista_presente", type="string", length=255, nullable=true)
     */
    private $listaPresente;

    /**
     * @var string
     *
     * @ORM\Column(name="ata", type="string", length=255, nullable=true)
     */
    private $ata;

    /**
     * @var string
     *
     * @ORM\Column(name="imagem", type="blob", length=65535, nullable=true)
     */
    private $imagem;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_imagem", type="string", length=5, nullable=false)
     */
    private $tipoImagem;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set dataEvento
     *
     * @param string $dataEvento
     * @return Reuniao
     */
    public function setDataEvento($dataEvento) {
        $this->dataEvento = $dataEvento;

        return $this;
    }

    /**
     * Get dataEvento
     *
     * @return string 
     */
    public function getDataEvento() {
        return $this->dataEvento;
    }

    /**
     * Set eventos
     *
     * @param string $eventos
     * @return Reuniao
     */
    public function setEventos($eventos) {
        $this->eventos = $eventos;

        return $this;
    }

    /**
     * Get eventos
     *
     * @return string 
     */
    public function getEventos() {
        return $this->eventos;
    }

    /**
     * Set pauta
     *
     * @param string $pauta
     * @return Reuniao
     */
    public function setPauta($pauta) {
        $this->pauta = $pauta;

        return $this;
    }

    /**
     * Get pauta
     *
     * @return string 
     */
    public function getPauta() {
        return $this->pauta;
    }

    /**
     * Set cardapio
     *
     * @param string $cardapio
     * @return Reuniao
     */
    public function setCardapio($cardapio) {
        $this->cardapio = $cardapio;

        return $this;
    }

    /**
     * Get cardapio
     *
     * @return string 
     */
    public function getCardapio() {
        return $this->cardapio;
    }

    /**
     * Set listaPresente
     *
     * @param string $listaPresente
     * @return Reuniao
     */
    public function setListaPresente($listaPresente) {
        $this->listaPresente = $listaPresente;

        return $this;
    }

    /**
     * Get listaPresente
     *
     * @return string 
     */
    public function getListaPresente() {
        return $this->listaPresente;
    }

    /**
     * Set ata
     *
     * @param string $ata
     * @return Reuniao
     */
    public function setAta($ata) {
        $this->ata = $ata;

        return $this;
    }

    /**
     * Get ata
     *
     * @return string 
     */
    public function getAta() {
        return $this->ata;
    }

    /**
     * Set imagem
     *
     * @param string $imagem
     * @return Reuniao
     */
    public function setImagens($imagem) {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get imagem
     *
     * @return string 
     */
    public function getImagens() {
        return $this->imagem;
    }

    /**
     * Set tipoImagem
     *
     * @param string $tipoImagem
     * @return Reuniao
     */
    public function setTipoImagem($tipoImagem) {
        $this->tipoImagem = $tipoImagem;

        return $this;
    }

    /**
     * Get tipoImagem
     *
     * @return string 
     */
    public function getTipoImagem() {
        return $this->tipoImagem;
    }

}
