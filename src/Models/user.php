<?php

class User 
{
    private $id;
    private $nom;
    private $prenom;
    private $email;
    private $mdp;
    private $telephone;
    private $adressePostale;
    
    


    function __construct($nom, $prenom, $email, $mdp, $telephone, $adressePostale, $id = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdp = $mdp;
        $this->telephone = $telephone;
        $this->adressePostale = $adressePostale;

        
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
     * Get the value of nom
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     */
    public function setNom($nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     */
    public function setPrenom($prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mdp
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set the value of mdp
     */
    public function setMdp($mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */
    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdressePostale()
    {
        return $this->adressePostale;
    }

    /**
     * Set the value of adresse
     */
    public function setAdressePostale($adressePostale): self
    {
        $this->adressePostale = $adressePostale;

        return $this;
    }
}

   