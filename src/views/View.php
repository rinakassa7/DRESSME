<?php


class View
{

    protected $router;
    protected $errorsDisplay;
    protected $authentificationManager;
    protected $navbar;

    public function __construct($router, $errorsDisplay,$authentificationManager)
    {
        $this->router = $router; 
        $this->errorsDisplay = $errorsDisplay;
        $this->authentificationManager = $authentificationManager;
        $this->navbar = array(

            $middleNavBar = array(
                "Accueil" => $this->router->home_URL(),
                "Femme"   => $this->router->annonces_woman_URL(),
                "Homme"   => $this->router->annonces_man_URL(),
                "Enfant"  => $this->router->annonces_kids_URL(),
            ),

            $rightNavBar = array(
                "Connexion"   => $this->router->login_URL(),
                "Inscription" => $this->router->register_URL(),
            )
        );
    }


    public function render_home_page()
    {

        $page_link        = "views/public/includes/link/home/link.php";
        $title            = "DRESSME - HOME";
        $HTML_content     = "views/public/pages/home/home.php";
        $top_middle_title = "DRESSME";
        require_once("views/public/pages/template.php");

    }

    public function render_about_page()
    {

        $page_link        = "views/public/includes/link/about/link.php";
        $title            = "DRESSME - ABOUT";
        $HTML_content     = "views/public/pages/about/about.php";
        $top_middle_title = "DRESSME";
        require_once("views/public/pages/template.php");

    }

    
    public function render_register_page()
    {

        $page_link        = "views/public/includes/link/register/link.php";
        $title            = "DRESSME - REGISTER";
        $HTML_content     = "views/public/pages/register/register.php";
        $top_middle_title = "DRESSME";
        $error_message    = $this->errorsDisplay->error_register_form();
        $form_save        = $_SESSION['register_form_save'];
        require_once("views/public/pages/template.php");

    }

    public function render_login_page()
    {
        
        $page_link        = "views/public/includes/link/login/link.php";
        $title            = "DRESSME - LOGIN";
        $HTML_content     = "views/public/pages/login/login.php";
        $top_middle_title = "DRESSME";
        $error_message    = $this->errorsDisplay->error_login_form();
        $form_save        = $_SESSION['login_form_save'];

        require_once("views/public/pages/template.php");

    }

    public function render_woman_annonces_page($liste_annonces)
    {

        $page_link        = "views/public/includes/link/annonces/link.php";
        $title            = "DRESSME - WOMAN";
        $HTML_content     = "views/public/pages/annonces/annonces.php";
        $top_middle_title = "FEMME";
        $custom_css       = "css/theme/pages/annonces/woman.css";
        require_once("views/public/pages/template.php");

    }

    public function render_man_annonces_page($liste_annonces)
    {

        $page_link        = "views/public/includes/link/annonces/link.php";
        $title            = "DRESSME - MAN";
        $HTML_content     = "views/public/pages/annonces/annonces.php";
        $top_middle_title = "HOMME";
        $custom_css       = "css/theme/pages/annonces/man.css";

        require_once("views/public/pages/template.php");

    }

    public function render_kids_annonces_page($liste_annonces)
    {

        $page_link        = "views/public/includes/link/annonces/link.php";
        $title            = "DRESSME - KIDS";
        $HTML_content     = "views/public/pages/annonces/annonces.php";
        $top_middle_title = "ENFANT";
        $custom_css       = "css/theme/pages/annonces/kids.css";

        require_once("views/public/pages/template.php");

    }

    public function render_all_annonces_page($liste_annonces)
    {

        $page_link        = "views/public/includes/link/annonces/link.php";
        $title            = "DRESSME - ALL";
        $HTML_content     = "views/public/pages/annonces/annonces.php";
        $top_middle_title = "DRESSME";
        $custom_css       = "css/theme/pages/annonces/all.css";

        require_once("views/public/pages/template.php");

    }

    public function render_complement_page()
    {
        $page_link        = "views/public/includes/link/annonces/link.php";
        $title            = "DRESSME - COMPLEMENT";
        $HTML_content     = "views/public/pages/complement/complement.php";
        $custom_css       = "css/theme/pages/complement/styles.css";

        require_once("views/public/pages/template.php");
    }



}



?>