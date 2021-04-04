<?php

require_once('models/AccountManager/Account.php');
require_once('models/AccountManager/AccountStorageStub.php');
require_once('models/Database/AccountDatabase/AccountDatabase.php');

class RegisterController extends Controller
{

    private $annoncesStorageStub;


    public function __construct($router,$request)
    {

        parent::__construct($router,$request);

        $this->cant_be_connected();


        $this->accountStorageStub      = new AccountStorageStub(new AccountDatabase());

    }

    public function make_register_page()
    {

        if(!empty($_POST)){
            $this->form_register_treatment();
        }else{
            
            $_SESSION['register_form_save'] = array(
                "prenom" => "",
                "nom"    => "",
                "pseudo" => "",
                "password" => "",
                "email" => "",
                "telephone" => "",
            );
            
            $this->view->render_register_page();
        }

    }

    public function form_register_treatment()
    {

        $prenom             = $this->request->getSecurityPostParam("prenom","");
        $nom                = $this->request->getSecurityPostParam("nom","");
        $pseudo             = $this->request->getSecurityPostParam("pseudo","");
        $password           = $this->request->getSecurityPostParam("password","");
        $password_confirm   = $this->request->getSecurityPostParam("password_confirm","");
        $email              = $this->request->getSecurityPostParam("email","");
        $telephone          = $this->request->getSecurityPostParam("telephone","");
        $sexe               = $this->request->getSecurityPostParam("sexe","");

        if($sexe == "femme"){
            $profil_picture_path = "assets/images/profil/femme_default.svg";
        }else{
            $profil_picture_path = "assets/images/profil/homme_default.svg";
        }

        $status = "user";
        
        $_SESSION['register_form_save'] = array(
            "prenom"    => $prenom,
            "nom"       => $nom,
            "pseudo"    => $pseudo,
            "password"  => $password,
            "email"     => $email,
            "telephone" => $telephone,
        );

        $account = new Account(0,$prenom,$nom,$pseudo,$password,$email,$telephone,$sexe,$status,date("m.d.y"),$profil_picture_path,0,0);

        if(!$account->is_prenom_valid())                                        $this->router->register_redirection_error(1);
        if(!$account->is_nom_valid())                                           $this->router->register_redirection_error(2);
        if(!$account->is_pseudo_valid())                                        $this->router->register_redirection_error(3);
        if($this->accountStorageStub->is_utilisateur_exist($pseudo))            $this->router->register_redirection_error(4);
        if(!$account->is_password_valid())                                      $this->router->register_redirection_error(5);
        if($password === $password_confirm)                                     $this->router->register_redirection_error(6);
        if(!$account->is_email_valid())                                         $this->router->register_redirection_error(7);
        if(!$account->is_telephone_valid())                                     $this->router->register_redirection_error(8);
        if(!$account->is_sexe_valid())                                          $this->router->register_redirection_error(9);

        $account->set_password(password_hash($password,PASSWORD_BCRYPT));

        $this->accountStorageStub->create_utilisateur($account);

        $this->router->home_redirection();

    }



}


?>