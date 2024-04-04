<?php

class Pass 
{
    private $id;
    private $jour;
    private $tarif_reduit;
    private $date_jour;
    private $prix;

    function __construct($jour, $tarif_reduit, $date_jour, $prix, $id = null)
    {
        $this->id = $id;
        $this->jour = $jour;
        $this->tarif_reduit = $tarif_reduit;
        $this->date_jour = $date_jour;
        $this->prix = $prix;

        
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
     * Get the value of jour
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set the value of jour
     */
    public function setJour($jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get the value of tarif_reduit
     */
    public function getTarifReduit()
    {
        return $this->tarif_reduit;
    }

    /**
     * Set the value of tarif_reduit
     */
    public function setTarifReduit($tarif_reduit): self
    {
        $this->tarif_reduit = $tarif_reduit;

        return $this;
    }

    /**
     * Get the value of date_jour
     */
    public function getDateJour()
    {
        return $this->date_jour;
    }

    /**
     * Set the value of date_jour
     */
    public function setDateJour($date_jour): self
    {
        $this->date_jour = $date_jour;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     */
    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}