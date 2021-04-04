<?php

require_once('controllers/Controller.php');

require_once('models/AnnoncesManager/AnnoncesStorageStub.php');
require_once('models/Database/AnnoncesDatabase/AnnoncesDatabase.php');
require_once('models/UploadManager/UploadManager.php');

require_once('models/AccountManager/AccountStorageStub.php');
require_once('models/Database/AccountDatabase/AccountDatabase.php');

require_once('models/CommentairesManager/CommentairesStorageStub.php');
require_once('models/Database/CommentairesDatabase/CommentairesDatabase.php');

class ProfilController extends Controller
{

    private $annoncesStorageStub;
    private $uploadManager;
    private $select_option;
    private $accountStorageStub;
    private $commentairesStorageStub;

    public function __construct($router,$request)
    {
        parent::__construct($router,$request);

        $this->need_to_be_connected();
        $this->annoncesStorageStub     = new AnnoncesStorageStub(new AnnoncesDatabase());
        $this->accountStorageStub      = new AccountStorageStub(new AccountDatabase());
        $this->commentairesStorageStub = new CommentairesStorageStub(new CommentairesDatabase());

        $this->uploadManager           = new UploadManager(); //Notre gestionnaire d'upload


        /**
         * Les options disponible pour la création d'annonce
         */
        $this->select_option = array(
            "type_annonce" => array(
                "femme",
                "homme",
                "enfant"
            ),

            "type" => array(
                "vetement",
                "accessoires",
                "chaussures",
                "sacs"
            ),

            "type_detail" => array(
                "manteaux",
                "doudounes",
                "pulls",
                "gilets",
                "vests",
                "robe/jupes",
                "pantalons",
                "jeans",
                "t-shirts",
                "maille",
                "sacs à main",
                "sacs à dos",
                "bottes/bottines",
                "baskets"
            ),

            "etat" => array(
                "detruit",
                "mauvais etat",
                "etat normale",
                "bonne etat",
                "neuf",
            ),
        );

    }

    /**
     * demande à la vue d'afficher la page de profil
     */
    public function make_profil_page()
    {

        $liste_annonces = $this->annoncesStorageStub->get_utilisateur_annonces($_SESSION['user']->get_id());


        $this->view->render_profil_page($liste_annonces);

    }


    public function make_create_annonces_page()
    {

        $_SESSION["form-content"] = array(

            "description"    => "",
            "prix"           => "",
            "miniature_path" => ""

        );

 

        if(!empty($_POST)){
            $this->form_annonces_treatment($this->select_option);
        }else{
            $this->view->render_creation_annonce_page($this->select_option);
        }


    }

    public function form_annonces_treatment($select_option)
    {
        
        $type_annonce_possible = $this->select_option["type_annonce"];
        $type_possible         = $this->select_option["type"];
        $type_detail_possible  = $this->select_option["type_detail"];
        $etat_possible         = $this->select_option["etat"];

        $description   = $this->request->getSecurityPostParam("description","");
        $prix          = $this->request->getSecurityPostParam("prix","");
        $type_annonce  = $this->request->getSecurityPostParam("type_annonce","");
        $type          = $this->request->getSecurityPostParam("type","");
        $type_detail   = $this->request->getSecurityPostParam("type_detail","");
        $etat          = $this->request->getSecurityPostParam("etat","");

        $_SESSION["form-content"] = array(

            "description"    => "",
            "prix"           => "0",

        );

        $id = $this->annoncesStorageStub->get_last_annonce_id() + 1;

        $annonce = new Annonces($id,$_SESSION['user']->get_id(),$description,$type_annonce,$prix,"",$type,$type_detail,$etat,null);

        if(!$annonce->is_description_valid())                     $this->router->create_annonces_redirection_error(1); 
        if(!$annonce->is_prix_valid())                            $this->router->create_annonces_redirection_error(2); 
        if(!in_array($type_annonce,$type_annonce_possible))       $this->router->create_annonces_redirection_error(3); 
        if(!in_array($type,$type_possible))                       $this->router->create_annonces_redirection_error(4);
        if(!in_array($type_detail,$type_detail_possible))         $this->router->create_annonces_redirection_error(5);
        if(!in_array($etat,$etat_possible))                       $this->router->create_annonces_redirection_error(6);       
        if(!$this->uploadManager->upload_annonces_images($id))    $this->router->create_annonces_redirection_error(7);       
        if(!$this->uploadManager->upload_annonces_miniature($id)) $this->router->create_annonces_redirection_error(8);
        
        $miniature_path = $this->uploadManager->get_miniature_path();

        $annonce->set_miniature_path($miniature_path);

        if($type_annonce      === "femme")  $annonce->set_type_annonce("woman");
        else if($type_annonce === "homme")  $annonce->set_type_annonce("man");
        else if($type_annonce === "enfant") $annonce->set_type_annonce("kids");

        $this->annoncesStorageStub->create_annonce($annonce);

        $this->router->profil_redirection();

    }

    public function make_update_annonces_page()
    {


        $annonce_id = $this->check_id_valid();

        if(!empty($_POST)){
            $this->update_annonce_treatment($annonce_id);
        }

        $annonce_data = $this->annoncesStorageStub->get_annonce_detail($annonce_id);

        if(empty($annonce_data)) $this->router->home_redirection();

        $this->view->render_update_annonce_page($annonce_data,$this->select_option);

    }

    public function update_annonce_treatment($id)
    {

        $type_annonce_possible = $this->select_option["type_annonce"];
        $type_possible         = $this->select_option["type"];
        $type_detail_possible  = $this->select_option["type_detail"];
        $etat_possible         = $this->select_option["etat"];

        $description    = $this->request->getSecurityPostParam("description","");
        $prix           = $this->request->getSecurityPostParam("prix","");
        $type_annonce   = $this->request->getSecurityPostParam("type_annonce","");
        $type           = $this->request->getSecurityPostParam("type","");
        $type_detail    = $this->request->getSecurityPostParam("type_detail","");
        $etat           = $this->request->getSecurityPostParam("etat","");
        $miniature_path = $this->request->getSecurityPostParam("miniature_path","");

        $id = $this->check_id_valid();

        $annonce = new Annonces($id,$_SESSION['user']->get_id(),$description,$type_annonce,$prix,$miniature_path,$type,$type_detail,$etat,null);

        if(!$annonce->is_description_valid())                     $this->router->update_annonces_redirection_error(1); 
        if(!$annonce->is_prix_valid())                            $this->router->update_annonces_redirection_error(2); 
        if(!in_array($type_annonce,$type_annonce_possible))       $this->router->update_annonces_redirection_error(3); 
        if(!in_array($type,$type_possible))                       $this->router->update_annonces_redirection_error(4);
        if(!in_array($type_detail,$type_detail_possible))         $this->router->update_annonces_redirection_error(5);
        if(!in_array($etat,$etat_possible))                       $this->router->update_annonces_redirection_error(6);       
        

        if($_FILES['miniature']['name']!=''){
            $this->uploadManager->upload_annonces_miniature($id);
            $miniature_path = $this->uploadManager->get_miniature_path();
            $annonce->set_miniature_path($miniature_path);
        }

        if($_FILES['file']['name'][0]!=''){
            $this->uploadManager->upload_annonces_images($id);   
        }






        if($type_annonce      === "femme")  $annonce->set_type_annonce("woman");
        else if($type_annonce === "homme")  $annonce->set_type_annonce("man");
        else if($type_annonce === "enfant") $annonce->set_type_annonce("kids");

        $this->annoncesStorageStub->update_annonce($annonce);

        $this->router->profil_redirection();


    }


    public function make_delete_commentaires_page()
    {

        if($this->commentairesStorageStub->is_commentaire_utilisateur($_SESSION['user']->get_id(),$this->router->get_id())){
            $this->commentairesStorageStub->delete_commentaire($this->router->get_id());
        }
        $this->make_show_commentaires_page();



    }

    public function make_show_commentaires_page()
    {

        $liste_commentaire = $this->commentairesStorageStub->constructor_commentaires_utilisateur($_SESSION['user']->get_id());


        $this->view->render_show_commentaires_page($liste_commentaire);

    }


    public function make_delete_annonces_page()
    {

        $annonce_id = $this->check_id_valid();

        if($this->annoncesStorageStub->is_annonce_utilisateur($_SESSION['user']->get_id(),$annonce_id)){
            
            $this->annoncesStorageStub->delete_annonce($annonce_id);
            $this->commentairesStorageStub->delete_annnonce_commentaire($annonce_id);

        }

        $this->make_profil_page();

    }

    private function check_id_valid()
    {

        $annonce_id = $this->router->get_id();

        if(!is_numeric($annonce_id)) $this->router->profil_redirection();
        if($annonce_id < 0) $this->router->profil_redirection();

        return $annonce_id;

    }

    public function make_update_commentaires_page()
    {

        if($this->commentairesStorageStub->is_commentaire_utilisateur($_SESSION['user']->get_id(),$this->router->get_id())){

            $id = $this->check_id_valid();
            $commentaire = $this->commentairesStorageStub->get_commentaires($id);

            if(!empty($_POST)){
                $this->form_update_commentaires_treatment($commentaire);
            }


            $form_content = array(
                "commentaire" => $commentaire->get_commentaire(),
                "commentaire_id" => $commentaire->get_id()
            );

            $this->view->render_update_commentaires_page($form_content);

        }else{
            $this->router->profil_redirection();
        }


    }

    public function form_update_commentaires_treatment($commentaire)
    {

        $new_commmentaire = $this->request->getSecurityPostParam("commentaire","");

        $commentaire->set_commentaire($new_commmentaire);

        if($commentaire->is_commentaire_valid()){
            $this->commentairesStorageStub->update_commentaire($commentaire);
        }
        $this->router->profil_redirection();

    }
 

    public function make_update_profil_page()
    {

        $current_account  = $_SESSION['user'];


        if(!empty($_POST)){

            $this->form_update_profil_treatment($current_account);

        }else{

            $_SESSION['update_form'] = array(
                "prenom"    => $current_account->get_prenom(),
                "nom"       => $current_account->get_nom(),
                "pseudo"    => $current_account->get_pseudo(),
                "email"     => $current_account->get_email(),
                "telephone" => $current_account->get_telephone(),
            );
        }

        $this->view->render_update_profil_page();

    }

    private function form_update_profil_treatment($current_account)
    {

        $id                         = $current_account->get_id();
        $prenom                     = $this->request->getSecurityPostParam("prenom","");
        $nom                        = $this->request->getSecurityPostParam("nom","");
        $pseudo                     = $this->request->getSecurityPostParam("pseudo","");
        $password                   = $current_account->get_password();

        $email                      = $this->request->getSecurityPostParam("email","");
        $telephone                  = $this->request->getSecurityPostParam("telephone","");
        $sexe                       = $this->request->getSecurityPostParam("sexe","");
        $status                     = $current_account->get_status();
        $date_inscription           = $current_account->get_date_inscription();
        $profil_picture_path        = $current_account->get_profil_picture_path();
        $nombre_annonces_poste      = $current_account->get_nombre_annonces_poste();
        $nombre_commentaires_poste  = $current_account->get_nombre_annonces_poste();

                
        $_SESSION['register_form_save'] = array(
            "prenom"    => $prenom,
            "nom"       => $nom,
            "pseudo"    => $pseudo,
            "password"  => $password,
            "email"     => $email,
            "telephone" => $telephone,
        );


        
        
        $account = new Account($id,$prenom,$nom,$pseudo,$password,$email,$telephone,$sexe,$status,$date_inscription,$profil_picture_path,$nombre_annonces_poste,$nombre_commentaires_poste);
        
       
        if(!$account->is_prenom_valid())                                        $this->router->update_profil_redirection_error(1);
        if(!$account->is_nom_valid())                                           $this->router->update_profil_redirection_error(2);
        if(!$account->is_pseudo_valid())                                        $this->router->update_profil_redirection_error(3);
        
        if($account->get_pseudo() !== $_SESSION['user']->get_pseudo()){
            if($this->accountStorageStub->is_utilisateur_exist($pseudo))            $this->router->update_profil_redirection_error(4);
        }
        
        if(!$account->is_email_valid())                                         $this->router->update_profil_redirection_error(5);
        if(!$account->is_telephone_valid())                                     $this->router->update_profil_redirection_error(6);
        if(!$account->is_sexe_valid())                                          $this->router->update_profil_redirection_error(7);
       

        if ($_FILES['profil_picture']['size'] != 0){
            
            $this->uploadManager->upload_profil_pictures($id);

            $account->set_profil_picture_path($this->uploadManager->get_profil_picture_path());

        }

        $this->commentairesStorageStub->update_utilisateur_commentaires_pseudo($pseudo,$id);

        $this->accountStorageStub->update_utilisateur($account);
        $_SESSION['user'] = $account;
        $this->router->profil_redirection();


    }

    public function make_logout_profil()
    {
        $this->authentificationManager->logout_utilisateur();
        $this->router->home_redirection();
    }

}


?>