<?php


class Commentaires
{
    
    

    private $id;
    private $utilisateur_id;
    private $annonce_id;
    private $commentaire;
    private $date_poste;
    private $pseudo_utilisateur;

    public function __construct($id, $utilisateur_id, $annonce_id, $commentaire, $date_poste, $pseudo_utilisateur)
    {

        $this->id = $id;
        $this->utilisateur_id = $utilisateur_id;
        $this->annonce_id = $annonce_id;
        $this->commentaire = $commentaire;
        $this->date_poste = $date_poste;
        $this->pseudo_utilisateur = $pseudo_utilisateur;
    }


    public function is_commentaire_valid()
    {

        if(strlen($this->commentaire) > 500) return false;
        if(strlen($this->commentaire) < 5)   return false;
        return true;

    }



    //
    // ────────────────────────────────────────────────────────────────────────── I ──────────
    //   :::::: G E T T E R   A N D   S E T T E R : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────────────────────────────────
    //

    


  

    /**
     * Get the value of id
     */ 
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function set_id($id)
    {
        $this->id = $id;

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
    public function set_utilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }

    /**
     * Get the value of annonce_id
     */ 
    public function get_annonce_id()
    {
        return $this->annonce_id;
    }

    /**
     * Set the value of annonce_id
     *
     * @return  self
     */ 
    public function set_annonce_id($annonce_id)
    {
        $this->annonce_id = $annonce_id;

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
    public function set_date_poste($date_poste)
    {
        $this->date_poste = $date_poste;

        return $this;
    }

    /**
     * Get the value of pseudo_utilisateur
     */ 
    public function get_pseudo_utilisateur()
    {
        return $this->pseudo_utilisateur;
    }

    /**
     * Set the value of pseudo_utilisateur
     *
     * @return  self
     */ 
    public function set_pseudo_utilisateur($pseudo_utilisateur)
    {
        $this->pseudo_utilisateur = $pseudo_utilisateur;

        return $this;
    }

    /**
     * Get the value of commentaire
     */ 
    public function get_commentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function set_commentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }
}


?>