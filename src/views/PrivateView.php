<?php

require_once('views/View.php');

require_once('models/AccountManager/Account.php');

class PrivateView extends View
{

    public function __construct($router, $errorsDisplay,$authentificationManager)
    {
       parent::__construct($router, $errorsDisplay,$authentificationManager);

       $this->navbar = array(

        $middleNavBar = array(
            "Accueil" => $this->router->home_URL(),
            "Femme"   => $this->router->annonces_woman_URL(),
            "Homme"   => $this->router->annonces_man_URL(),
            "Enfant"  => $this->router->annonces_kids_URL(),
        ),

        $rightNavBar = array(
            "Profil"      => $this->router->profil_URL(),
            "Deconnexion" => $this->router->logout_URL(),
        )

   );

    }


    public function render_profil_page($liste_annonces)
    {
        
        $page_link               = "views/public/includes/link/profil/link.php";
        $title                   = "DRESSME - PROFIL";
        $HTML_content            = "views/public/pages/profil/profil.php";
        $custom_css              = "css/theme/pages/profil/profil_home/styles.css";
        $custom_css_mobile       = "css/mobile/pages/profil/profil_home/styles.css";
        $right_content           = "views/public/pages/annonces/annonces_show.php";

        $user_data               = $_SESSION['user'];

        require_once("views/public/pages/template.php");

    }


    public function render_update_annonce_page($annonce_data,$select_option)
    {
        
        $page_link        = "views/public/includes/link/profil/link.php";
        $title            = "DRESSME - PROFIL";
        $HTML_content     = "views/public/pages/profil/profil.php";
        $right_content    = "views/public/pages/profil/annonces_creation_update/annonces_form.php";
        $user_data        = $_SESSION['user'];
        $custom_css        = "css/theme/pages/profil/annonces_creation_update/styles.css";
        $custom_css_mobile =  "css/mobile/pages/profil/annonces_creation_update/styles.css";

        $error_message    = $this->errorsDisplay->error_annonces_form();

        $form_content = array(
            "description" => $annonce_data->get_description(),
            "prix" => $annonce_data->get_prix(),
            "miniature_path" => $annonce_data->get_miniature_path()
        );

        $form_action  = $this->router->update_annonces_URL($this->router->get_id());
        $button_value = "Créer l'annonce";

        require_once("views/public/pages/template.php");

    }

    public function render_update_profil_page()
    {
        
        $page_link        =  "views/public/includes/link/profil/link.php";
        $title            =  "DRESSME - PROFIL";
        $HTML_content     =  "views/public/pages/profil/profil.php";
        $right_content    =  "views/public/pages/profil/profil_update/profil_update.php";
        $user_data        =  $_SESSION['user'];
        $custom_css        =  "css/theme/pages/profil/profil_update/styles.css";
        $custom_css_mobile =  "css/mobile/pages/profil/profil_update/styles.css";

        $error_message    = $this->errorsDisplay->error_profil_update_form();

        $form_content = $_SESSION['update_form'];

        require_once("views/public/pages/template.php");

    }

    public function render_creation_annonce_page($select_option)
    {
        
        $page_link        = "views/public/includes/link/profil/link.php";
        $title            = "DRESSME - PROFIL";
        $HTML_content     = "views/public/pages/profil/profil.php";
        $right_content    = "views/public/pages/profil/annonces_creation_update/annonces_form.php";
        $user_data        = $_SESSION['user'];
        $custom_css        = "css/theme/pages/profil/annonces_creation_update/styles.css";
        $custom_css_mobile =  "css/mobile/pages/profil/annonces_creation_update/styles.css";

        $error_message    = $this->errorsDisplay->error_annonces_form();

        $form_content = $_SESSION['form-content'];
        $form_action  = $this->router->create_annonces_URL();
        $button_value = "Créer l'annonce";

        require_once("views/public/pages/template.php");

    }

    public function render_show_commentaires_page($liste_commentaires)
    {
        
        $page_link        = "views/public/includes/link/profil/link.php";
        $title            = "DRESSME - PROFIL";
        $HTML_content     = "views/public/pages/profil/profil.php";
        $right_content    = "views/public/pages/profil/commentaires_show/commentaires_show.php";
        $user_data        = $_SESSION['user'];
        $custom_css        = "css/theme/pages/profil/commentaires_show/styles.css";
        $custom_css_mobile =  "css/mobile/pages/profil/commentaires_show/styles.css";

        $error_message    = $this->errorsDisplay->error_annonces_form();

        $form_action  = $this->router->create_annonces_URL();
        $button_value = "Créer l'annonce";

        require_once("views/public/pages/template.php");

    }


    public function render_detail_annonces_page($data_annnonce,$data_utilisateur,$commentaires_annonce,$image_path)
    {

        $page_link        = "views/public/includes/link/detail/link.php";
        $title            = "DRESSME - DETAIL";
        $HTML_content     = "views/public/pages/detail/detail.php";
        require_once("views/public/pages/template.php");

    }

 
    public function render_update_commentaires_page($form_content)
    {
        
        $page_link        = "views/public/includes/link/profil/link.php";
        $title            = "DRESSME - PROFIL";
        $HTML_content     = "views/public/pages/profil/profil.php";
        $right_content    = "views/public/pages/profil/commentaires_update/commentaires_update.php";
        $user_data        = $_SESSION['user'];
        $custom_css        = "css/theme/pages/profil/commentaires_update/styles.css";
        $custom_css_mobile =  "css/mobile/pages/profil/commentaires_update/styles.css";

        $error_message    = $this->errorsDisplay->error_annonces_form();

        $form_action  = $this->router->create_annonces_URL();
        $button_value = "Créer l'annonce";

        require_once("views/public/pages/template.php");

    }


}



?>