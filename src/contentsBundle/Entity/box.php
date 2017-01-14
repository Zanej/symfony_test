<?php

namespace contentsBundle\Entity;

/**
 * box
 */
class box
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
    private $idRif;

    /**
     * @var int
     */
    private $idParent;

    /**
     * @var string
     */
    private $titolo;

    /**
     * @var string
     */
    private $titolopar;

    /**
     * @var string
     */
    private $titolo2par;

    /**
     * @var string
     */
    private $titolo3par;

    /**
     * @var string
     */
    private $testo;

    /**
     * @var string
     */
    private $testo2;

    /**
     * @var string
     */
    private $testo3;

    /**
     * @var string
     */
    private $img;

    /**
     * @var string
     */
    private $img2;

    /**
     * @var string
     */
    private $allegato;

    /**
     * @var bool
     */
    private $stato;

    /**
     * @var int
     */
    private $idCollegato;

    /**
     * @var int
     */
    private $idCollegato2;

    /**
     * @var bool
     */
    private $viewportDesktop;

    /**
     * @var bool
     */
    private $viewportMobile;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $titlink;

    /**
     * @var bool
     */
    private $target;

    /**
     * @var string
     */
    private $link2;

    /**
     * @var string
     */
    private $titlink2;

    /**
     * @var bool
     */
    private $target2;

    /**
     * @var string
     */
    private $youtubeCode;

    /**
     * @var string
     */
    private $vimeoCode;


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
     * @return box
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
     * Set idRif
     *
     * @param integer $idRif
     *
     * @return box
     */
    public function setIdRif($idRif)
    {
        $this->idRif = $idRif;

        return $this;
    }

    /**
     * Get idRif
     *
     * @return int
     */
    public function getIdRif()
    {
        return $this->idRif;
    }

    /**
     * Set idParent
     *
     * @param integer $idParent
     *
     * @return box
     */
    public function setIdParent($idParent)
    {
        $this->idParent = $idParent;

        return $this;
    }

    /**
     * Get idParent
     *
     * @return int
     */
    public function getIdParent()
    {
        return $this->idParent;
    }

    /**
     * Set titolo
     *
     * @param string $titolo
     *
     * @return box
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
     * Set titolopar
     *
     * @param string $titolopar
     *
     * @return box
     */
    public function setTitolopar($titolopar)
    {
        $this->titolopar = $titolopar;

        return $this;
    }

    /**
     * Get titolopar
     *
     * @return string
     */
    public function getTitolopar()
    {
        return $this->titolopar;
    }

    /**
     * Set titolo2par
     *
     * @param string $titolo2par
     *
     * @return box
     */
    public function setTitolo2par($titolo2par)
    {
        $this->titolo2par = $titolo2par;

        return $this;
    }

    /**
     * Get titolo2par
     *
     * @return string
     */
    public function getTitolo2par()
    {
        return $this->titolo2par;
    }

    /**
     * Set titolo3par
     *
     * @param string $titolo3par
     *
     * @return box
     */
    public function setTitolo3par($titolo3par)
    {
        $this->titolo3par = $titolo3par;

        return $this;
    }

    /**
     * Get titolo3par
     *
     * @return string
     */
    public function getTitolo3par()
    {
        return $this->titolo3par;
    }

    /**
     * Set testo
     *
     * @param string $testo
     *
     * @return box
     */
    public function setTesto($testo)
    {
        $this->testo = $testo;

        return $this;
    }

    /**
     * Get testo
     *
     * @return string
     */
    public function getTesto()
    {
        return $this->testo;
    }

    /**
     * Set testo2
     *
     * @param string $testo2
     *
     * @return box
     */
    public function setTesto2($testo2)
    {
        $this->testo2 = $testo2;

        return $this;
    }

    /**
     * Get testo2
     *
     * @return string
     */
    public function getTesto2()
    {
        return $this->testo2;
    }

    /**
     * Set testo3
     *
     * @param string $testo3
     *
     * @return box
     */
    public function setTesto3($testo3)
    {
        $this->testo3 = $testo3;

        return $this;
    }

    /**
     * Get testo3
     *
     * @return string
     */
    public function getTesto3()
    {
        return $this->testo3;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return box
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set img2
     *
     * @param string $img2
     *
     * @return box
     */
    public function setImg2($img2)
    {
        $this->img2 = $img2;

        return $this;
    }

    /**
     * Get img2
     *
     * @return string
     */
    public function getImg2()
    {
        return $this->img2;
    }

    /**
     * Set allegato
     *
     * @param string $allegato
     *
     * @return box
     */
    public function setAllegato($allegato)
    {
        $this->allegato = $allegato;

        return $this;
    }

    /**
     * Get allegato
     *
     * @return string
     */
    public function getAllegato()
    {
        return $this->allegato;
    }

    /**
     * Set stato
     *
     * @param boolean $stato
     *
     * @return box
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
     * Set idCollegato
     *
     * @param integer $idCollegato
     *
     * @return box
     */
    public function setIdCollegato($idCollegato)
    {
        $this->idCollegato = $idCollegato;

        return $this;
    }

    /**
     * Get idCollegato
     *
     * @return int
     */
    public function getIdCollegato()
    {
        return $this->idCollegato;
    }

    /**
     * Set idCollegato2
     *
     * @param integer $idCollegato2
     *
     * @return box
     */
    public function setIdCollegato2($idCollegato2)
    {
        $this->idCollegato2 = $idCollegato2;

        return $this;
    }

    /**
     * Get idCollegato2
     *
     * @return int
     */
    public function getIdCollegato2()
    {
        return $this->idCollegato2;
    }

    /**
     * Set viewportDesktop
     *
     * @param boolean $viewportDesktop
     *
     * @return box
     */
    public function setViewportDesktop($viewportDesktop)
    {
        $this->viewportDesktop = $viewportDesktop;

        return $this;
    }

    /**
     * Get viewportDesktop
     *
     * @return bool
     */
    public function getViewportDesktop()
    {
        return $this->viewportDesktop;
    }

    /**
     * Set viewportMobile
     *
     * @param boolean $viewportMobile
     *
     * @return box
     */
    public function setViewportMobile($viewportMobile)
    {
        $this->viewportMobile = $viewportMobile;

        return $this;
    }

    /**
     * Get viewportMobile
     *
     * @return bool
     */
    public function getViewportMobile()
    {
        return $this->viewportMobile;
    }

    /**
     * Set link
     *
     * @param string $link
     *
     * @return box
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set titlink
     *
     * @param string $titlink
     *
     * @return box
     */
    public function setTitlink($titlink)
    {
        $this->titlink = $titlink;

        return $this;
    }

    /**
     * Get titlink
     *
     * @return string
     */
    public function getTitlink()
    {
        return $this->titlink;
    }

    /**
     * Set target
     *
     * @param boolean $target
     *
     * @return box
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return bool
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set link2
     *
     * @param string $link2
     *
     * @return box
     */
    public function setLink2($link2)
    {
        $this->link2 = $link2;

        return $this;
    }

    /**
     * Get link2
     *
     * @return string
     */
    public function getLink2()
    {
        return $this->link2;
    }

    /**
     * Set titlink2
     *
     * @param string $titlink2
     *
     * @return box
     */
    public function setTitlink2($titlink2)
    {
        $this->titlink2 = $titlink2;

        return $this;
    }

    /**
     * Get titlink2
     *
     * @return string
     */
    public function getTitlink2()
    {
        return $this->titlink2;
    }

    /**
     * Set target2
     *
     * @param boolean $target2
     *
     * @return box
     */
    public function setTarget2($target2)
    {
        $this->target2 = $target2;

        return $this;
    }

    /**
     * Get target2
     *
     * @return bool
     */
    public function getTarget2()
    {
        return $this->target2;
    }

    /**
     * Set youtubeCode
     *
     * @param string $youtubeCode
     *
     * @return box
     */
    public function setYoutubeCode($youtubeCode)
    {
        $this->youtubeCode = $youtubeCode;

        return $this;
    }

    /**
     * Get youtubeCode
     *
     * @return string
     */
    public function getYoutubeCode()
    {
        return $this->youtubeCode;
    }

    /**
     * Set vimeoCode
     *
     * @param string $vimeoCode
     *
     * @return box
     */
    public function setVimeoCode($vimeoCode)
    {
        $this->vimeoCode = $vimeoCode;

        return $this;
    }

    /**
     * Get vimeoCode
     *
     * @return string
     */
    public function getVimeoCode()
    {
        return $this->vimeoCode;
    }
    /**
     * @var string
     */
    private $manyToOne;


    /**
     * Set manyToOne
     *
     * @param string $manyToOne
     *
     * @return box
     */
    public function setManyToOne($manyToOne)
    {
        $this->manyToOne = $manyToOne;

        return $this;
    }

    /**
     * Get manyToOne
     *
     * @return string
     */
    public function getManyToOne()
    {
        return $this->manyToOne;
    }
    /**
     * @var integer
     */
    private $rifBox;


    /**
     * Set rifBox
     *
     * @param integer $rifBox
     *
     * @return box
     */
    public function setRifBox($rifBox)
    {
        $this->rifBox = $rifBox;

        return $this;
    }

    /**
     * Get rifBox
     *
     * @return integer
     */
    public function getRifBox()
    {
        return $this->rifBox;
    }
}
