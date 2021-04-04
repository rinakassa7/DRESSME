<?php



class Account
{
    private $id;
    private $prenom;
    private $nom;
    private $pseudo;
    private $password;
    private $email;
    private $telephone;
    private $sexe;
    private $status;
    private $date_inscription;
    private $profil_picture_path;
    private $nombre_annonces_poste;
    private $nombre_commentaires_poste;

    public function __construct($id, $prenom, $nom, $pseudo, $password, $email, $telephone, $sexe, $status, $date_inscription, $profil_picture_path, $nombre_annonces_poste, $nombre_commentaires_poste)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->sexe = $sexe;
        $this->status = $status;
        $this->date_inscription = $date_inscription;
        $this->profil_picture_path = $profil_picture_path;
        $this->nombre_annonces_poste = $nombre_annonces_poste;
        $this->nombre_commentaires_poste = $nombre_commentaires_poste;
    }

     
    

    public function is_prenom_valid()
    {
        if(strlen($this->prenom) < 3 ) return false;
        if(strlen($this->prenom) > 15) return false;

        return true;
    }

    public function is_nom_valid()
    {
        if(strlen($this->nom) < 3)  return false;
        if(strlen($this->nom) > 20) return false;

        return true;
    }

    public function is_pseudo_valid()
    {
        
        if(strlen($this->pseudo) < 3 ) return false;
        if(strlen($this->pseudo) > 15) return false;

        return true;
    }

    public function is_password_valid()
    {
        if( strlen($this->password) < 3)  return false;
        if( strlen($this->password) > 15) return false;    
    
        return true;
    }

    public function is_telephone_valid()
    {

        if(!preg_match("#[0][6][- \.?]?([0-9][0-9][- \.?]?){4}$#", $this->telephone)) return false;
        else return true;

    }

    public function is_email_valid()
    {

        if(filter_var($this->email,FILTER_VALIDATE_EMAIL)) return true;
        else return false;
       
    }

    public function is_sexe_valid()
    {
        $sexe = ["femme","homme"];

        if(!in_array($this->sexe,$sexe)) return false;
        else return true;
        
    }


    //
    // ────────────────────────────────────────────────────────────────────────── I ──────────
    //   :::::: G E T T E R   A N D   S E T T E R : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────────────────────────────────
    //

    



    /**
     * Get the value of nombre_commentaires_poste
     */ 
    public function get_nombre_commentaires_poste()
    {
        return $this->nombre_commentaires_poste;
    }

    /**
     * Set the value of nombre_commentaires_poste
     *
     * @return  self
     */ 
    public function set_nombre_commentaires_poste($nombre_commentaires_poste)
    {
        $this->nombre_commentaires_poste = $nombre_commentaires_poste;

        return $this;
    }

    /**
     * Get the value of nombre_annonces_poste
     */ 
    public function get_nombre_annonces_poste()
    {
        return $this->nombre_annonces_poste;
    }

    /**
     * Set the value of nombre_annonces_poste
     *
     * @return  self
     */ 
    public function set_nombre_annonces_poste($nombre_annonces_poste)
    {
        $this->nombre_annonces_poste = $nombre_annonces_poste;

        return $this;
    }

    /**
     * Get the value of profil_picture_path
     */ 
    public function get_profil_picture_path()
    {
        return $this->profil_picture_path;
    }

    /**
     * Set the value of profil_picture_path
     *
     * @return  self
     */ 
    public function set_profil_picture_path($profil_picture_path)
    {
        $this->profil_picture_path = $profil_picture_path;

        return $this;
    }

    /**
     * Get the value of date_inscription
     */ 
    public function get_date_inscription()
    {
        return $this->date_inscription;
    }

    /**
     * Set the value of date_inscription
     *
     * @return  self
     */ 
    public function set_date_inscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function get_status()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function set_status($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of sexe
     */ 
    public function get_sexe()
    {
        return $this->sexe;
    }

    /**
     * Set the value of sexe
     *
     * @return  self
     */ 
    public function set_sexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function get_telephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function set_telephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function get_email()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function set_email($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function get_password()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function set_password($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of pseudo
     */ 
    public function get_pseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function set_pseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function get_nom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function set_nom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function get_prenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function set_prenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

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
}






?>