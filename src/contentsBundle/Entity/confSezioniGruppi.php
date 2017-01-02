<?php

namespace contentsBundle\Entity;

/**
 * conf_sezioni_gruppi
 */
class confSezioniGruppi
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titolo;

    /**
     * @var bool
     */
    private $stato;


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
     * Set titolo
     *
     * @param string $titolo
     *
     * @return conf_sezioni_gruppi
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
     * Set stato
     *
     * @param boolean $stato
     *
     * @return conf_sezioni_gruppi
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
}

