<?php




class Router
{
 
    private $request;

    private $confirmation_type;
    private $controller_name;
    private $action_name;
    private $page_name;
    private $error_id;
    private $id;

    public function __construct($request)
    {

        $this->request = $request;
        $this->parseURL();
    }


    public function parseURL()
    {

        $controller              = $this->request->getSecurityGetParam("controller","public");
        $this->page_name         = $this->request->getSecurityGetParam("page","home");
        $this->action_name       = $this->request->getSecurityGetParam("action","show");
        $this->id                = $this->request->getSecurityGetParam("id","");
        $this->confirmation_type = $this->request->getSecurityGetParam("confirmation","");
        $this->error_id          = $this->request->getSecurityGetParam("errorId","0");
  


        switch($controller)
        {

            case "public":
                $this->controller_name = "PublicController";
            break;

            case "profil":
                $this->controller_name = "ProfilController";
            break;

            case "register":
                $this->controller_name = "RegisterController";
            break;

            case "login":
                $this->controller_name = "LoginController";
            break;

            case "annonces":
                $this->controller_name = "AnnoncesController";
            break;

        }
   
   
    }




    //
    // ────────────────────────────────────────────── I ──────────
    //   :::::: U R L : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────
    //

    
    public function home_URL()
    {
        return "?controller=public&page=home";
    }

    public function about_URL()
    {
        return "?controller=public&page=about";
    }

    public function annonces_all_URL()
    {
        return "?controller=annonces&page=all";
    }

    public function annonces_woman_URL()
    {
        return "?controller=annonces&page=woman";
    }

    public function annonces_man_URL()
    {
        return "?controller=annonces&page=man";
    }

    public function annonces_kids_URL()
    {
        return "?controller=annonces&page=kids";
    }

    public function annonces_detail_url($annonce_id)
    {
        return "?controller=annonces&page=detail&id=$annonce_id";
    }

    public function login_URL()
    {
        return "?controller=login&page=login";
    }

    public function register_URL()
    {
        return "?controller=register&page=register";
    }

    public function profil_URL()
    {
        return "?controller=profil&page=profil";
    }

    public function create_annonces_URL()
    {
        return "?controller=profil&page=createAnnonces";
    }

    public function update_annonces_URL($id)
    {
        return "?controller=profil&page=updateAnnonces&id=$id";
    }

    public function delete_annonces_URL($id)
    {
        return "?controller=profil&page=deleteAnnonces&id=$id";
    }

    public function update_commentaires_URL($id)
    {
        return "?controller=profil&page=updateCommentaires&id=$id";
    }
    
    public function delete_commentaires_URL($id)
    {
        return "?controller=profil&page=deleteCommentaires&id=$id";
    }

    public function show_commentaires_URL()
    {
        return "?controller=profil&page=showCommentaires";
    }

    public function update_profil_URL()
    {
        return "?controller=profil&page=updateProfil";
    }

    public function logout_URL()
    {
        return "?controller=profil&page=logout";
    }

    public function complement_URL()
    {
        return "?controller=public&page=complement";
    }

    //
    // ────────────────────────────────────────────────────────────── I ──────────
    //   :::::: R E D I R E C T I O N : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────────────────────
    //

    

    public function home_redirection()
    {
        header('Location: '.$this->home_URL());
        exit();
    }

    public function profil_redirection()
    {
        header('Location: '.$this->profil_URL());
        exit();
    }

    public function register_redirection()
    {
        header('Location: '.$this->register_URL());
        exit();
    }

    public function register_redirection_error($error_id)
    {
        header('Location: '.$this->register_error_URL($error_id));
        exit();
    }

    public function login_redirection_error($error_id)
    {
        header('Location: '.$this->login_error_URL($error_id));
        exit();
    }

    public function create_annonces_redirection_error($error_id)
    {
        header('Location: '.$this->create_annonces_error_URL($error_id));
        exit();
    }

    public function update_profil_redirection_error($error_id)
    {
        header('Location: '.$this->update_profil_error_URL($error_id));
        exit();
    }

    public function update_annonces_redirection_error($error_id)
    {
        header('Location: '.$this->update_annonces_error_URL($error_id));
        exit();
    }

    //
    // ────────────────────────────────────────────────────────────────────── I ──────────
    //   :::::: U R L   A V E C   E R R E U R : :  :   :    :     :        :          :
    // ────────────────────────────────────────────────────────────────────────────────
    //

    
    public function login_error_URL($error_id)
    {
        return "?controller=login&page=login&confirmation=error&errorId=$error_id";
    }

    public function register_error_URL($error_id)
    {
        return "?controller=register&page=register&confirmation=error&errorId=$error_id";
    }

    public function create_annonces_error_URL($error_id)
    {
        return "?controller=profil&page=createAnnonces&confirmation=error&errorId=$error_id";
    }

    public function update_profil_error_URL($error_id)
    {
        return "?controller=profil&page=updateProfil&confirmation=error&errorId=$error_id";
    }

    public function update_annonces_error_URL($error_id)
    {
        return "?controller=profil&page=updateAnnonces&confirmation=error&errorId=$error_id";
    }

    //
    // ──────────────────────────────────────────────────────────── I ──────────
    //   :::::: U R L   S U C C E S : :  :   :    :     :        :          :
    // ──────────────────────────────────────────────────────────────────────
    //

    public function login_succes_URL()
    {
        return "?controller=login&page=login&confirmation=succes";
    }

    public function register_succes_URL()
    {
        return "?controller=register&page=register&confirmation=succes";
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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of error_id
     */ 
    public function get_error_id()
    {
        return $this->error_id;
    }

    /**
     * Set the value of error_id
     *
     * @return  self
     */ 
    public function setError_id($error_id)
    {
        $this->error_id = $error_id;

        return $this;
    }

    /**
     * Get the value of page_name
     */ 
    public function getPage_name()
    {
        return $this->page_name;
    }

    /**
     * Set the value of page_name
     *
     * @return  self
     */ 
    public function setPage_name($page_name)
    {
        $this->page_name = $page_name;

        return $this;
    }

    /**
     * Get the value of confirmation_type
     */ 
    public function getConfirmation_type()
    {
        return $this->confirmation_type;
    }

    /**
     * Set the value of confirmation_type
     *
     * @return  self
     */ 
    public function setConfirmation_type($confirmation_type)
    {
        $this->confirmation_type = $confirmation_type;

        return $this;
    }

    /**
     * Get the value of controller_name
     */ 
    public function get_controller_name()
    {
        return $this->controller_name;
    }

    /**
     * Set the value of controller_name
     *
     * @return  self
     */ 
    public function setController_name($controller_name)
    {
        $this->controller_name = $controller_name;

        return $this;
    }

    /**
     * Get the value of action_name
     */ 
    public function getAction_name()
    {
        return $this->action_name;
    }

    /**
     * Set the value of action_name
     *
     * @return  self
     */ 
    public function setAction_name($action_name)
    {
        $this->action_name = $action_name;

        return $this;
    }
}


?>