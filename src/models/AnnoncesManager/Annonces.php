<?php


class Annonces
{
    private $annonces_id;
    private $utilisateur_id;
    private $description;
    private $type_annonce;
    private $prix;
    private $miniature_path;
    private $type;
    private $type_detail;
    private $etat;
    private $date_poste;

    public function __construct($annonces_id, $utilisateur_id, $description, $type_annonce, $prix, $miniature_path, $type, $type_detail, $etat, $date_poste)
    {
    
        $this->annonces_id    = $annonces_id;
        $this->utilisateur_id = $utilisateur_id;
        $this->description    = $description;
        $this->type_annonce   = $type_annonce;
        $this->prix           = $prix;
        $this->miniature_path = $miniature_path;
        $this->type           = $type;
        $this->type_detail    = $type_detail;
        $this->etat           = $etat;
        $this->date_poste     = $date_poste;
    
    }



    
    public function is_description_valid()
    {
        if(strlen($this->description) > 1000) return false;
        if(strlen($this->description) < 1) return false;
        
        return true;
    }

    public function is_prix_valid()
    {
        if(!is_numeric($this->prix)) return false; 
        if($this->prix < 0)          return false;
        
        return true;

    }


    //
    // ────────────────────────────────────────────────────────────────────────── I ──────────
    //   :::::: G E T T E R   A N D   S E T T E R : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────────────────────────────────
    //


    /**
     * Get the value of annonces_id
     */ 
    public function get_annonces_id()
    {
        return $this->annonces_id;
    }

    /**
     * Set the value of annonces_id
     *
     * @return  self
     */ 
    public function setAnnonces_id($annonces_id)
    {
        $this->annonces_id = $annonces_id;

        return $this;
    }

    /**
     * Get the value of utilisateur_id
     */ 
    public function get_utilisateur_id()
    {
        return $this->utilisateur_id;
    }

    /**
     * Set the value of utilisateur_id
     *
     * @return  self
     */ 
    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function get_description()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of type_annonce
     */ 
    public function get_type_annonce()
    {
        return $this->type_annonce;
    }

    /**
     * Set the value of type_annonce
     *
     * @return  self
     */ 
    public function set_type_annonce($type_annonce)
    {
        $this->type_annonce = $type_annonce;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function get_prix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of miniature_path
     */ 
    public function get_miniature_path()
    {
        return $this->miniature_path;
    }

    /**
     * Set the value of miniature_path
     *
     * @return  self
     */ 
    public function set_miniature_path($miniature_path)
    {
        $this->miniature_path = $miniature_path;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function get_type()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of type_detail
     */ 
    public function get_type_detail()
    {
        return $this->type_detail;
    }

    /**
     * Set the value of type_detail
     *
     * @return  self
     */ 
    public function setType_detail($type_detail)
    {
        $this->type_detail = $type_detail;

        return $this;
    }

    /**
     * Get the value of etat
     */ 
    public function get_etat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of date_poste
     */ 
    public function get_date_poste()
    {
        return $this->date_poste;
    }

    /**
     * Set the value of date_poste
     *
     * @return  self
     */ 
    public function setDate_poste($date_poste)
    {
        $this->date_poste = $date_poste;

        return $this;
    }
}



?>