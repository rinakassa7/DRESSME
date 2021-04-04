<?php


require_once('controllers/PublicController/PublicController.php');
require_once('controllers/ProfilController/ProfilController.php');
require_once('controllers/LoginController/LoginController.php');
require_once('controllers/RegisterController/RegisterController.php');
require_once('controllers/AnnoncesController/AnnoncesController.php');
require_once('routers/Router.php');
require_once('lib/Request/Request.php');


class FrontController
{

    private $request;
    private $router;
    private $controller;



    public function __construct()
    {


        $this->request = new Request();
        $this->router  = new Router($this->request);


        switch($this->router->get_controller_name())
        {

            case "PublicController":        //Les pages qui n'ont pas besoin de beaucoup de données et de traitement
                $this->controller = new PublicController($this->router, $this->request);
                $this->public_controller();
            break;

            case "ProfilController": //Les pages accesible sur la page de profil
                $this->controller = new ProfilController($this->router, $this->request);
                $this->profil_controller();
            break;

            case "RegisterController": //S'ocucupe de toute la partie inscriptio,
                $this->controller = new RegisterController($this->router, $this->request);
                $this->register_controller();
            break;

            case "LoginController": //S'occupe de toute la partie Connexion
                $this->controller = new LoginController($this->router, $this->request);
                $this->login_controller();
            break;

            case "AnnoncesController": //S'occupe de l'affichage des annonces
                $this->controller = new AnnoncesController($this->router, $this->request);
                $this->annonces_controller();
            break;  

        }

    }


    /**
     * Les pages que le routeur public gère
     */
    private function public_controller()
    {


        switch($this->router->getPage_name()){
            
            case "home":
                $this->controller->make_home_page();
            break;

            case "about":
                $this->controller->make_about_page();
            break;

            case "complement":
                $this->controller->make_complement_page();
            break;

            default:
                $this->router->home_redirection();
            break;
        }

    }

    /**
     * Les pages que le routeur de profil gère
     */
    private function profil_controller()
    {

        switch($this->router->getPage_name()){

            case "profil":
                $this->controller->make_profil_page();
            break;

            case "logout":
                $this->controller->make_logout_profil();
            break;

            case "createAnnonces":
                $this->controller->make_create_annonces_page();
            break;

            case "updateAnnonces":
                $this->controller->make_update_annonces_page();
            break;

            case "deleteAnnonces":
                $this->controller->make_delete_annonces_page();
            break;

            case "showCommentaires":
                $this->controller->make_show_commentaires_page();
            break;

            case "updateCommentaires":
                $this->controller->make_update_commentaires_page();
            break;

            case "deleteCommentaires":
                $this->controller->make_delete_commentaires_page();
            break;

            case "updateProfil":
                $this->controller->make_update_profil_page();
            break;
            default:
                $this->router->home_redirection();
            break;
        }

    }

    /**
     * Les pages que le routeur Register gère
     */
    private function register_controller()
    {

        switch($this->router->getPage_name()){

            case "register":
                $this->controller->make_register_page();
            break;   
            default:
                $this->router->home_redirection();
            break;
        }

    }

        /**
     * Les pages que login public gère
     */
    private function login_controller()
    {

        switch($this->router->getPage_name()){

            case "login":
                $this->controller->make_login_page();
            break;
            default:
                $this->router->home_redirection();
            break;
        }

    }

    /**
     * Les pages que le routeur annonces gère
     */
    private function annonces_controller()
    {

        switch($this->router->getPage_name()){

            case "woman":
                $this->controller->make_woman_annonces_page();
            break;   

            case "man":
                $this->controller->make_man_annonces_page();
            break;   

            case "kids":
                $this->controller->make_kids_annonces_page();
            break;   

            case "all":
                $this->controller->make_all_annonces_page();
            break;   

            case "detail":
                $this->controller->make_detail_annonces_page();
            break;
            default:
                $this->router->home_redirection();
            break;

        }

    }

    public function getController()
    {
        return $this->controller;
    }

    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    
}



?>