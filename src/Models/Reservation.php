<?php


class Reservation
{
    private $id;
    private $nb_resa;
    private $enfants;
    private $luge;
    private $casque;

    function __construct($nb_resa, $enfants, $luge, $casque, $id = null)
    {
        $this->id = $id;
        $this->nb_resa = $nb_resa;
        $this->enfants = $enfants;
        $this->luge = $luge;
        $this->casque = $casque;
        
    }

    

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nb_resa
     */
    public function getNbResa()
    {
        return $this->nb_resa;
    }

    /**
     * Set the value of nb_resa
     */
    public function setNbResa($nb_resa): self
    {
        $this->nb_resa = $nb_resa;

        return $this;
    }

    /**
     * Get the value of enfants
     */
    public function getEnfants()
    {
        return $this->enfants;
    }

    /**
     * Set the value of enfants
     */
    public function setEnfants($enfants): self
    {
        $this->enfants = $enfants;

        return $this;
    }

    /**
     * Get the value of luge
     */
    public function getLuge()
    {
        return $this->luge;
    }

    /**
     * Set the value of luge
     */
    public function setLuge($luge): self
    {
        $this->luge = $luge;

        return $this;
    }

    /**
     * Get the value of casque
     */
    public function getCasque()
    {
        return $this->casque;
    }

    /**
     * Set the value of casque
     */
    public function setCasque($casque): self
    {
        $this->casque = $casque;

        return $this;
    }
}