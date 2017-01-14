<?php

namespace contentsBundle\Entity;

/**
 * conf_sezioni_box
 */
class conf_sezioni_box
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idSezione;

    /**
     * @var int
     */
    private $rifBox;

    /**
     * @var int
     */
    private $sottobox;

    /**
     * @var int
     */
    private $formato;

    /**
     * @var string
     */
    private $campo;

    /**
     * @var array
     */
    private $parametri;

    /**
     * @var bool
     */
    private $stato;

    /**
     * @var string
     */
    private $titolo;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idSezione
     *
     * @param integer $idSezione
     *
     * @return conf_sezioni_box
     */
    public function setIdSezione($idSezione)
    {
        $this->idSezione = $idSezione;

        return $this;
    }

    /**
     * Get idSezione
     *
     * @return int
     */
    public function getIdSezione()
    {
        return $this->idSezione;
    }

    /**
     * Set rifBox
     *
     * @param integer $rifBox
     *
     * @return conf_sezioni_box
     */
    public function setRifBox($rifBox)
    {
        $this->rifBox = $rifBox;

        return $this;
    }

    /**
     * Get rifBox
     *
     * @return int
     */
    public function getRifBox()
    {
        return $this->rifBox;
    }

    /**
     * Set sottobox
     *
     * @param integer $sottobox
     *
     * @return conf_sezioni_box
     */
    public function setSottobox($sottobox)
    {
        $this->sottobox = $sottobox;

        return $this;
    }

    /**
     * Get sottobox
     *
     * @return int
     */
    public function getSottobox()
    {
        return $this->sottobox;
    }

    /**
     * Set formato
     *
     * @param integer $formato
     *
     * @return conf_sezioni_box
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;

        return $this;
    }

    /**
     * Get formato
     *
     * @return int
     */
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * Set campo
     *
     * @param string $campo
     *
     * @return conf_sezioni_box
     */
    public function setCampo($campo)
    {
        $this->campo = $campo;

        return $this;
    }

    /**
     * Get campo
     *
     * @return string
     */
    public function getCampo()
    {
        return $this->campo;
    }

    /**
     * Set parametri
     *
     * @param array $parametri
     *
     * @return conf_sezioni_box
     */
    public function setParametri($parametri)
    {
        $this->parametri = $parametri;

        return $this;
    }

    /**
     * Get parametri
     *
     * @return array
     */
    public function getParametri()
    {
        return $this->parametri;
    }

    /**
     * Set stato
     *
     * @param boolean $stato
     *
     * @return conf_sezioni_box
     */
    public function setStato($stato)
    {
        $this->stato = $stato;

        return $this;
    }

    /**
     * Get stato
     *
     * @return bool
     */
    public function getStato()
    {
        return $this->stato;
    }

    /**
     * Set titolo
     *
     * @param string $titolo
     *
     * @return conf_sezioni_box
     */
    public function setTitolo($titolo)
    {
        $this->titolo = $titolo;

        return $this;
    }

    /**
     * Get titolo
     *
     * @return string
     */
    public function getTitolo()
    {
        return $this->titolo;
    }
    /**
     * @var integer
     */
    private $ordine;


    /**
     * Set ordine
     *
     * @param integer $ordine
     *
     * @return conf_sezioni_box
     */
    public function setOrdine($ordine)
    {
        $this->ordine = $ordine;

        return $this;
    }

    /**
     * Get ordine
     *
     * @return integer
     */
    public function getOrdine()
    {
        return $this->ordine;
    }
}
