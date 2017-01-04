<?php

namespace contentsBundle\Entity;

/**
 * confTable
 */
class confTable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $idSezione;

    /**
     * @var string
     */
    private $comment;
    
    /**     
     * @var boolean
     */
    private $stato;
    /**
     * @var boolean
     */
    private $view_scheda;

    /**
     * @var boolean
     */
    private $view_frontend;
    
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
     * Set field
     *
     * @param string $field
     *
     * @return confTable
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return confTable
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idSezione
     *
     * @param integer $idSezione
     *
     * @return confTable
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
     * Set comment
     *
     * @param string $comment
     *
     * @return confTable
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
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
     * Sets stato
     * @var $stato boolean
     */
    public function setStato($stato)
    {
        $this->stato = $stato;
    }
    


    /**
     * Set viewScheda
     *
     * @param boolean $viewScheda
     *
     * @return confTable
     */
    public function setViewScheda($viewScheda)
    {
        $this->view_scheda = $viewScheda;

        return $this;
    }

    /**
     * Get viewScheda
     *
     * @return boolean
     */
    public function getViewScheda()
    {
        return $this->view_scheda;
    }

    /**
     * Set viewFrontend
     *
     * @param boolean $viewFrontend
     *
     * @return confTable
     */
    public function setViewFrontend($viewFrontend)
    {
        $this->view_frontend = $viewFrontend;

        return $this;
    }

    /**
     * Get viewFrontend
     *
     * @return boolean
     */
    public function getViewFrontend()
    {
        return $this->view_frontend;
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
     * @return confTable
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
     * @var boolean
     */
    private $view_detail;


    /**
     * Set viewDetail
     *
     * @param boolean $viewDetail
     *
     * @return confTable
     */
    public function setViewDetail($viewDetail)
    {
        $this->view_detail = $viewDetail;

        return $this;
    }

    /**
     * Get viewDetail
     *
     * @return boolean
     */
    public function getViewDetail()
    {
        return $this->view_detail;
    }
    /**
     * @var integer
     */
    private $length_detail;


    /**
     * Set lengthDetail
     *
     * @param integer $lengthDetail
     *
     * @return confTable
     */
    public function setLengthDetail($lengthDetail)
    {
        $this->length_detail = $lengthDetail;

        return $this;
    }

    /**
     * Get lengthDetail
     *
     * @return integer
     */
    public function getLengthDetail()
    {
        return $this->length_detail;
    }
}
