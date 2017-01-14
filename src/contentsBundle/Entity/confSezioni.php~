<?php

namespace contentsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfSezioni
 *
 * @ORM\Table(name="conf_sezioni")
 * @ORM\Entity
 */
class confSezioni
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sezione", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSezione;

    /**
     * @var integer
     *
     * @ORM\Column(name="livello", type="integer", nullable=true)
     */
    private $livello;

    /**
     * @var string
     *
     * @ORM\Column(name="titolo", type="string", length=255, nullable=false)
     */
    private $titolo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_gruppo", type="integer", nullable=false)
     */
    private $idGruppo;

    /**
     * @var string
     *
     * @ORM\Column(name="link_preview", type="string", length=255, nullable=true)
     */
    private $linkPreview;

    /**
     * @var string
     *
     * @ORM\Column(name="field_preview", type="string", length=255, nullable=true)
     */
    private $fieldPreview;

    /**
     * @var string
     *
     * @ORM\Column(name="key_field", type="string", length=255, nullable=false)
     */
    private $keyField;

    /**
     * @var string
     *
     * @ORM\Column(name="tabella", type="string", length=255, nullable=false)
     */
    private $tabella;
    
     /**
     * @var string
     *
     * @ORM\Column(name="bundle", type="string", length=255, nullable=false)
     */
    private $bundle;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="box", type="boolean", nullable=false)
     */
    private $box;
    
    /**
     *
     * @var stato
     * 
     * @ORM\Column(name="stato", type="boolean", nullable = false)
     */
    private $stato;
    
    private $ordine;
    
    private $per_page;
    
    /**
     * Get idSezione
     *
     * @return integer
     */
    public function getIdSezione()
    {
        return $this->idSezione;
    }

    /**
     * Set livello
     *
     * @param integer $livello
     *
     * @return confSezioni
     */
    public function setLivello($livello)
    {
        $this->livello = $livello;

        return $this;
    }

    /**
     * Get livello
     *
     * @return integer
     */
    public function getLivello()
    {
        return $this->livello;
    }

    /**
     * Set titolo
     *
     * @param string $titolo
     *
     * @return confSezioni
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
     * Set linkPreview
     *
     * @param string $linkPreview
     *
     * @return confSezioni
     */
    public function setLinkPreview($linkPreview)
    {
        $this->linkPreview = $linkPreview;

        return $this;
    }

    /**
     * Get linkPreview
     *
     * @return string
     */
    public function getLinkPreview()
    {
        return $this->linkPreview;
    }

    /**
     * Set fieldPreview
     *
     * @param string $fieldPreview
     *
     * @return confSezioni
     */
    public function setFieldPreview($fieldPreview)
    {
        $this->fieldPreview = $fieldPreview;

        return $this;
    }

    /**
     * Get fieldPreview
     *
     * @return string
     */
    public function getFieldPreview()
    {
        return $this->fieldPreview;
    }

    /**
     * Set keyField
     *
     * @param string $keyField
     *
     * @return confSezioni
     */
    public function setKeyField($keyField)
    {
        $this->keyField = $keyField;

        return $this;
    }

    /**
     * Get keyField
     *
     * @return string
     */
    public function getKeyField()
    {
        return $this->keyField;
    }

    /**
     * Set tabella
     *
     * @param string $tabella
     *
     * @return confSezioni
     */
    public function setTabella($tabella)
    {
        $this->tabella = $tabella;

        return $this;
    }

    /**
     * Get tabella
     *
     * @return string
     */
    public function getTabella()
    {
        return $this->tabella;
    }

    /**
     * Set box
     *
     * @param boolean $box
     *
     * @return confSezioni
     */
    public function setBox($box)
    {
        $this->box = $box;

        return $this;
    }

    /**
     * Get box
     *
     * @return boolean
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * Set idGruppo
     *
     * @param \contentsBundle\Entity\confSezioniGruppi $idGruppo
     *
     * @return confSezioni
     */
    public function setIdGruppo(\contentsBundle\Entity\confSezioniGruppi $idGruppo = null)
    {
        $this->idGruppo = $idGruppo;

        return $this;
    }

    /**
     * Get idGruppo
     *
     * @return \contentsBundle\Entity\confSezioniGruppi
     */
    public function getIdGruppo()
    {
        return $this->idGruppo;
    }

    /**
     * Set ordine
     *
     * @param integer $ordine
     *
     * @return confSezioni
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

    /**
     * Set stato
     *
     * @param boolean $stato
     *
     * @return confSezioni
     */
    public function setStato($stato)
    {
        $this->stato = $stato;

        return $this;
    }

    /**
     * Get stato
     *
     * @return boolean
     */
    public function getStato()
    {
        return $this->stato;
    }

    /**
     * Set bundle
     *
     * @param string $bundle
     *
     * @return confSezioni
     */
    public function setBundle($bundle)
    {
        $this->bundle = $bundle;

        return $this;
    }

    /**
     * Get bundle
     *
     * @return string
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * Set perPage
     *
     * @param integer $perPage
     *
     * @return confSezioni
     */
    public function setPerPage($perPage)
    {
        $this->per_page = $perPage;

        return $this;
    }

    /**
     * Get perPage
     *
     * @return integer
     */
    public function getPerPage()
    {
        return $this->per_page;
    }
    /**
     * @var boolean
     */
    private $edit;

    /**
     * @var boolean
     */
    private $remove;

    /**
     * @var boolean
     */
    private $insert;

    /**
     * @var boolean
     */
    private $stato_abilitato;


    /**
     * Set edit
     *
     * @param boolean $edit
     *
     * @return confSezioni
     */
    public function setEdit($edit)
    {
        $this->edit = $edit;

        return $this;
    }

    /**
     * Get edit
     *
     * @return boolean
     */
    public function getEdit()
    {
        return $this->edit;
    }

    /**
     * Set remove
     *
     * @param boolean $remove
     *
     * @return confSezioni
     */
    public function setRemove($remove)
    {
        $this->remove = $remove;

        return $this;
    }

    /**
     * Get remove
     *
     * @return boolean
     */
    public function getRemove()
    {
        return $this->remove;
    }

    /**
     * Set insert
     *
     * @param boolean $insert
     *
     * @return confSezioni
     */
    public function setInsert($insert)
    {
        $this->insert = $insert;

        return $this;
    }

    /**
     * Get insert
     *
     * @return boolean
     */
    public function getInsert()
    {
        return $this->insert;
    }

    /**
     * Set statoAbilitato
     *
     * @param boolean $statoAbilitato
     *
     * @return confSezioni
     */
    public function setStatoAbilitato($statoAbilitato)
    {
        $this->stato_abilitato = $statoAbilitato;

        return $this;
    }

    /**
     * Get statoAbilitato
     *
     * @return boolean
     */
    public function getStatoAbilitato()
    {
        return $this->stato_abilitato;
    }
}
