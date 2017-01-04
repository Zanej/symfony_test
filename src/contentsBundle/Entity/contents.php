<?php

namespace contentsBundle\Entity;

/**
 * contents
 */
class contents
{
    
    public function __call($closure, $args)
    {
        return call_user_func_array($this->{$closure}->bindTo($this),$args);
    }
    
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $idSezione;

    /**
     * @var string
     */
    private $campo1;

    /**
     * @var string
     */
    private $campo2;

    /**
     * @var string
     */
    private $campo3;

    /**
     * @var string
     */
    private $campo4;

    /**
     * @var string
     */
    private $campo5;

    /**
     * @var int
     */
    private $campo6;

    /**
     * @var int
     */
    private $campo7;

    /**
     * @var int
     */
    private $campo8;

    /**
     * @var int
     */
    private $campo9;

    /**
     * @var int
     */
    private $campo10;

    /**
     * @var string
     */
    private $campo11;

    /**
     * @var string
     */
    private $campo12;

    /**
     * @var string
     */
    private $campo13;

    /**
     * @var string
     */
    private $campo14;

    /**
     * @var string
     */
    private $campo15;

    /**
     * @var \DateTime
     */
    private $campo16;

    /**
     * @var \DateTime
     */
    private $campo17;

    /**
     * @var \DateTime
     */
    private $campo18;

    /**
     * @var \DateTime
     */
    private $campo19;

    /**
     * @var \DateTime
     */
    private $campo20;

    /**
     * @var float
     */
    private $campo21;

    /**
     * @var float
     */
    private $campo22;

    /**
     * @var float
     */
    private $campo23;

    /**
     * @var \DateTime
     */
    private $campo24;

    /**
     * @var \DateTime
     */
    private $campo25;

    /**
     * @var \DateTime
     */
    private $campo26;

    /**
     * @var string
     */
    private $campo27;

    /**
     * @var string
     */
    private $campo28;

    /**
     * @var string
     */
    private $campo29;

    /**
     * @var string
     */
    private $campo30;

    /**
     * @var string
     */
    private $campo31;

    /**
     * @var int
     */
    private $campo32;

    /**
     * @var int
     */
    private $campo33;

    /**
     * @var int
     */
    private $campo34;

    /**
     * @var int
     */
    private $campo35;

    /**
     * @var array
     */
    private $campo36;

    /**
     * @var array
     */
    private $campo37;

    /**
     * @var array
     */
    private $campo38;

    /**
     * @var bool
     */
    private $campo39;

    /**
     * @var bool
     */
    private $campo40;

    /**
     * @var bool
     */
    private $campo41;

    /**
     * @var bool
     */
    private $campo42;
    
    /**
     *
     * @var bool
     */
    private $stato;
    
    private $ordine;
    
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
     * @return contents
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
     * Set campo1
     *
     * @param string $campo1
     *
     * @return contents
     */
    public function setCampo1($campo1)
    {
        $this->campo1 = $campo1;

        return $this;
    }

    /**
     * Get campo1
     *
     * @return string
     */
    public function getCampo1()
    {
        return $this->campo1;
    }

    /**
     * Set campo2
     *
     * @param string $campo2
     *
     * @return contents
     */
    public function setCampo2($campo2)
    {
        $this->campo2 = $campo2;

        return $this;
    }

    /**
     * Get campo2
     *
     * @return string
     */
    public function getCampo2()
    {
        return $this->campo2;
    }

    /**
     * Set campo3
     *
     * @param string $campo3
     *
     * @return contents
     */
    public function setCampo3($campo3)
    {
        $this->campo3 = $campo3;

        return $this;
    }

    /**
     * Get campo3
     *
     * @return string
     */
    public function getCampo3()
    {
        return $this->campo3;
    }

    /**
     * Set campo4
     *
     * @param string $campo4
     *
     * @return contents
     */
    public function setCampo4($campo4)
    {
        $this->campo4 = $campo4;

        return $this;
    }

    /**
     * Get campo4
     *
     * @return string
     */
    public function getCampo4()
    {
        return $this->campo4;
    }

    /**
     * Set campo5
     *
     * @param string $campo5
     *
     * @return contents
     */
    public function setCampo5($campo5)
    {
        $this->campo5 = $campo5;

        return $this;
    }

    /**
     * Get campo5
     *
     * @return string
     */
    public function getCampo5()
    {
        return $this->campo5;
    }

    /**
     * Set campo6
     *
     * @param integer $campo6
     *
     * @return contents
     */
    public function setCampo6($campo6)
    {
        $this->campo6 = $campo6;

        return $this;
    }

    /**
     * Get campo6
     *
     * @return int
     */
    public function getCampo6()
    {
        return $this->campo6;
    }

    /**
     * Set campo7
     *
     * @param integer $campo7
     *
     * @return contents
     */
    public function setCampo7($campo7)
    {
        $this->campo7 = $campo7;

        return $this;
    }

    /**
     * Get campo7
     *
     * @return int
     */
    public function getCampo7()
    {
        return $this->campo7;
    }

    /**
     * Set campo8
     *
     * @param integer $campo8
     *
     * @return contents
     */
    public function setCampo8($campo8)
    {
        $this->campo8 = $campo8;

        return $this;
    }

    /**
     * Get campo8
     *
     * @return int
     */
    public function getCampo8()
    {
        return $this->campo8;
    }

    /**
     * Set campo9
     *
     * @param integer $campo9
     *
     * @return contents
     */
    public function setCampo9($campo9)
    {
        $this->campo9 = $campo9;

        return $this;
    }

    /**
     * Get campo9
     *
     * @return int
     */
    public function getCampo9()
    {
        return $this->campo9;
    }

    /**
     * Set campo10
     *
     * @param integer $campo10
     *
     * @return contents
     */
    public function setCampo10($campo10)
    {
        $this->campo10 = $campo10;

        return $this;
    }

    /**
     * Get campo10
     *
     * @return int
     */
    public function getCampo10()
    {
        return $this->campo10;
    }

    /**
     * Set campo11
     *
     * @param string $campo11
     *
     * @return contents
     */
    public function setCampo11($campo11)
    {
        $this->campo11 = $campo11;

        return $this;
    }

    /**
     * Get campo11
     *
     * @return string
     */
    public function getCampo11()
    {
        return $this->campo11;
    }

    /**
     * Set campo12
     *
     * @param string $campo12
     *
     * @return contents
     */
    public function setCampo12($campo12)
    {
        $this->campo12 = $campo12;

        return $this;
    }

    /**
     * Get campo12
     *
     * @return string
     */
    public function getCampo12()
    {
        return $this->campo12;
    }

    /**
     * Set campo13
     *
     * @param string $campo13
     *
     * @return contents
     */
    public function setCampo13($campo13)
    {
        $this->campo13 = $campo13;

        return $this;
    }

    /**
     * Get campo13
     *
     * @return string
     */
    public function getCampo13()
    {
        return $this->campo13;
    }

    /**
     * Set campo14
     *
     * @param string $campo14
     *
     * @return contents
     */
    public function setCampo14($campo14)
    {
        $this->campo14 = $campo14;

        return $this;
    }

    /**
     * Get campo14
     *
     * @return string
     */
    public function getCampo14()
    {
        return $this->campo14;
    }

    /**
     * Set campo15
     *
     * @param string $campo15
     *
     * @return contents
     */
    public function setCampo15($campo15)
    {
        $this->campo15 = $campo15;

        return $this;
    }

    /**
     * Get campo15
     *
     * @return string
     */
    public function getCampo15()
    {
        return $this->campo15;
    }

    /**
     * Set campo16
     *
     * @param \DateTime $campo16
     *
     * @return contents
     */
    public function setCampo16($campo16)
    {
        $this->campo16 = $campo16;

        return $this;
    }

    /**
     * Get campo16
     *
     * @return \DateTime
     */
    public function getCampo16()
    {
        return $this->campo16;
    }

    /**
     * Set campo17
     *
     * @param \DateTime $campo17
     *
     * @return contents
     */
    public function setCampo17($campo17)
    {
        $this->campo17 = $campo17;

        return $this;
    }

    /**
     * Get campo17
     *
     * @return \DateTime
     */
    public function getCampo17()
    {
        return $this->campo17;
    }

    /**
     * Set campo18
     *
     * @param \DateTime $campo18
     *
     * @return contents
     */
    public function setCampo18($campo18)
    {
        $this->campo18 = $campo18;

        return $this;
    }

    /**
     * Get campo18
     *
     * @return \DateTime
     */
    public function getCampo18()
    {
        return $this->campo18;
    }

    /**
     * Set campo19
     *
     * @param \DateTime $campo19
     *
     * @return contents
     */
    public function setCampo19($campo19)
    {
        $this->campo19 = $campo19;

        return $this;
    }

    /**
     * Get campo19
     *
     * @return \DateTime
     */
    public function getCampo19()
    {
        return $this->campo19;
    }

    /**
     * Set campo20
     *
     * @param \DateTime $campo20
     *
     * @return contents
     */
    public function setCampo20($campo20)
    {
        $this->campo20 = $campo20;

        return $this;
    }

    /**
     * Get campo20
     *
     * @return \DateTime
     */
    public function getCampo20()
    {
        return $this->campo20;
    }

    /**
     * Set campo21
     *
     * @param float $campo21
     *
     * @return contents
     */
    public function setCampo21($campo21)
    {
        $this->campo21 = $campo21;

        return $this;
    }

    /**
     * Get campo21
     *
     * @return float
     */
    public function getCampo21()
    {
        return $this->campo21;
    }

    /**
     * Set campo22
     *
     * @param float $campo22
     *
     * @return contents
     */
    public function setCampo22($campo22)
    {
        $this->campo22 = $campo22;

        return $this;
    }

    /**
     * Get campo22
     *
     * @return float
     */
    public function getCampo22()
    {
        return $this->campo22;
    }

    /**
     * Set campo23
     *
     * @param float $campo23
     *
     * @return contents
     */
    public function setCampo23($campo23)
    {
        $this->campo23 = $campo23;

        return $this;
    }

    /**
     * Get campo23
     *
     * @return float
     */
    public function getCampo23()
    {
        return $this->campo23;
    }

    /**
     * Set campo24
     *
     * @param \DateTime $campo24
     *
     * @return contents
     */
    public function setCampo24($campo24)
    {
        $this->campo24 = $campo24;

        return $this;
    }

    /**
     * Get campo24
     *
     * @return \DateTime
     */
    public function getCampo24()
    {
        return $this->campo24;
    }

    /**
     * Set campo25
     *
     * @param \DateTime $campo25
     *
     * @return contents
     */
    public function setCampo25($campo25)
    {
        $this->campo25 = $campo25;

        return $this;
    }

    /**
     * Get campo25
     *
     * @return \DateTime
     */
    public function getCampo25()
    {
        return $this->campo25;
    }

    /**
     * Set campo26
     *
     * @param \DateTime $campo26
     *
     * @return contents
     */
    public function setCampo26($campo26)
    {
        $this->campo26 = $campo26;

        return $this;
    }

    /**
     * Get campo26
     *
     * @return \DateTime
     */
    public function getCampo26()
    {
        return $this->campo26;
    }

    /**
     * Set campo27
     *
     * @param string $campo27
     *
     * @return contents
     */
    public function setCampo27($campo27)
    {
        $this->campo27 = $campo27;

        return $this;
    }

    /**
     * Get campo27
     *
     * @return string
     */
    public function getCampo27()
    {
        return $this->campo27;
    }

    /**
     * Set campo28
     *
     * @param string $campo28
     *
     * @return contents
     */
    public function setCampo28($campo28)
    {
        $this->campo28 = $campo28;

        return $this;
    }

    /**
     * Get campo28
     *
     * @return string
     */
    public function getCampo28()
    {
        return $this->campo28;
    }

    /**
     * Set campo29
     *
     * @param string $campo29
     *
     * @return contents
     */
    public function setCampo29($campo29)
    {
        $this->campo29 = $campo29;

        return $this;
    }

    /**
     * Get campo29
     *
     * @return string
     */
    public function getCampo29()
    {
        return $this->campo29;
    }

    /**
     * Set campo30
     *
     * @param string $campo30
     *
     * @return contents
     */
    public function setCampo30($campo30)
    {
        $this->campo30 = $campo30;

        return $this;
    }

    /**
     * Get campo30
     *
     * @return string
     */
    public function getCampo30()
    {
        return $this->campo30;
    }

    /**
     * Set campo31
     *
     * @param string $campo31
     *
     * @return contents
     */
    public function setCampo31($campo31)
    {
        $this->campo31 = $campo31;

        return $this;
    }

    /**
     * Get campo31
     *
     * @return string
     */
    public function getCampo31()
    {
        return $this->campo31;
    }

    /**
     * Set campo32
     *
     * @param integer $campo32
     *
     * @return contents
     */
    public function setCampo32($campo32)
    {
        $this->campo32 = $campo32;

        return $this;
    }

    /**
     * Get campo32
     *
     * @return int
     */
    public function getCampo32()
    {
        return $this->campo32;
    }

    /**
     * Set campo33
     *
     * @param integer $campo33
     *
     * @return contents
     */
    public function setCampo33($campo33)
    {
        $this->campo33 = $campo33;

        return $this;
    }

    /**
     * Get campo33
     *
     * @return int
     */
    public function getCampo33()
    {
        return $this->campo33;
    }

    /**
     * Set campo34
     *
     * @param integer $campo34
     *
     * @return contents
     */
    public function setCampo34($campo34)
    {
        $this->campo34 = $campo34;

        return $this;
    }

    /**
     * Get campo34
     *
     * @return int
     */
    public function getCampo34()
    {
        return $this->campo34;
    }

    /**
     * Set campo35
     *
     * @param integer $campo35
     *
     * @return contents
     */
    public function setCampo35($campo35)
    {
        $this->campo35 = $campo35;

        return $this;
    }

    /**
     * Get campo35
     *
     * @return int
     */
    public function getCampo35()
    {
        return $this->campo35;
    }

    /**
     * Set campo36
     *
     * @param array $campo36
     *
     * @return contents
     */
    public function setCampo36($campo36)
    {
        $this->campo36 = $campo36;

        return $this;
    }

    /**
     * Get campo36
     *
     * @return array
     */
    public function getCampo36()
    {
        return $this->campo36;
    }

    /**
     * Set campo37
     *
     * @param array $campo37
     *
     * @return contents
     */
    public function setCampo37($campo37)
    {
        $this->campo37 = $campo37;

        return $this;
    }

    /**
     * Get campo37
     *
     * @return array
     */
    public function getCampo37()
    {
        return $this->campo37;
    }

    /**
     * Set campo38
     *
     * @param array $campo38
     *
     * @return contents
     */
    public function setCampo38($campo38)
    {
        $this->campo38 = $campo38;

        return $this;
    }

    /**
     * Get campo38
     *
     * @return array
     */
    public function getCampo38()
    {
        return $this->campo38;
    }

    /**
     * Set campo39
     *
     * @param boolean $campo39
     *
     * @return contents
     */
    public function setCampo39($campo39)
    {
        $this->campo39 = $campo39;

        return $this;
    }

    /**
     * Get campo39
     *
     * @return bool
     */
    public function getCampo39()
    {
        return $this->campo39;
    }

    /**
     * Set campo40
     *
     * @param boolean $campo40
     *
     * @return contents
     */
    public function setCampo40($campo40)
    {
        $this->campo40 = $campo40;

        return $this;
    }

    /**
     * Get campo40
     *
     * @return bool
     */
    public function getCampo40()
    {
        return $this->campo40;
    }

    /**
     * Set campo41
     *
     * @param boolean $campo41
     *
     * @return contents
     */
    public function setCampo41($campo41)
    {
        $this->campo41 = $campo41;

        return $this;
    }

    /**
     * Get campo41
     *
     * @return bool
     */
    public function getCampo41()
    {
        return $this->campo41;
    }

    /**
     * Set campo42
     *
     * @param boolean $campo42
     *
     * @return contents
     */
    public function setCampo42($campo42)
    {
        $this->campo42 = $campo42;

        return $this;
    }

    /**
     * Get campo42
     *
     * @return bool
     */
    public function getCampo42()
    {
        return $this->campo42;
    }

    /**
     * Set stato
     *
     * @param boolean $stato
     *
     * @return contents
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
     * Set ordine
     *
     * @param integer $ordine
     *
     * @return contents
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
