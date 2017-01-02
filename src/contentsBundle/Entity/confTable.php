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
}
