<?php

require_once('models/AccountManager/Account.php');
require_once('models/AccountManager/AccountStorageStub.php');
require_once('models/Database/AccountDatabase/AccountDatabase.php');

/**
 * Gère la connexion au compte
 */
class LoginController extends Controller
{

    private $accountStorageStub;

    public function __construct($router,$request)
    {
        parent::__construct($router,$request);

        $this->cant_be_connected(); //on ne peut pas acceder a cette page quand on est connecté 

        $this->accountStorageStub      = new AccountStorageStub(new AccountDatabase()); //Création de la class s'occupant des comptes en base de données 

    }

    /**
     * Deamnde à la vue d'afficher la page de connexion
     */
    public function make_login_page()
    {

        if(!empty($_POST)){ //Si les données on était envoyé on essaye de de se connecter
            $this->form_login_treatment();

        }else{

            $_SESSION['login_form_save'] = array(
                "pseudo_email" => "",
            );

            $this->view->render_login_page();

        

        }


    }

    /**
     * Permet de traiter le formulaire de connexion
     */
    public function form_login_treatment()
    {

        $pseudo_email   = $this->request->getSecurityPostParam("pseudo_email",""); //on recupere le pseudo de l'utilisateur
        $password       = $this->request->getSecurityPostParam("password",""); //On récupère sont mot de passe

        $_SESSION['login_form_save'] = array( //Si jamais il se trompe, on sauvegarder pour éviter que il perdre les données
            "pseudo_email" => $pseudo_email,
        );

        if(!$this->accountStorageStub->is_utilisateur_exist($pseudo_email,$pseudo_email)) $this->router->login_redirection_error(1); //on redirige vers la page avec une erreur si le compte n'existe pas

        $account = $this->accountStorageStub->constructor_utilisateur($pseudo_email,$pseudo_email); //On construit un compte utilisateur 


        if($this->authentificationManager->connect_utilisateur($account,$pseudo_email,$password)) $this->router->profil_redirection(); //Si on a pus se connecter on redirige vers la page de profil
        else $this->router->login_redirection_error(1); //Sinon on affiche une erreur
        

    }


}


?>