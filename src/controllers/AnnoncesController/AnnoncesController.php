<?php

require_once('models/AnnoncesManager/AnnoncesStorageStub.php');
require_once('models/Database/AnnoncesDatabase/AnnoncesDatabase.php');

require_once('models/AccountManager/AccountStorageStub.php');
require_once('models/Database/AccountDatabase/AccountDatabase.php');

require_once('models/CommentairesManager/CommentairesStorageStub.php');
require_once('models/Database/CommentairesDatabase/CommentairesDatabase.php');

/**
 * gère tous ce qui touche à l'afffichage des annonces dans les pages 
 */
class AnnoncesController extends Controller
{
    
    private $annoncesStorageStub;           //Class gérant les annonces en base de données
    private $commentairesStorageStub;       //Class gérant les commentaires en base de données
    private $accountStorageStub;            //Class gérant les comptes en base de données

    
    public function __construct($router,$request)
    {
        parent::__construct($router,$request);

        $this->annoncesStorageStub     = new AnnoncesStorageStub(new AnnoncesDatabase());
        $this->commentairesStorageStub = new CommentairesStorageStub(new CommentairesDatabase());
        $this->accountStorageStub      = new AccountStorageStub(new AccountDatabase());

    }
    
    /**
     * Requête à la vue pour : afficher la page des annonces pour femmes
     */
    public function make_woman_annonces_page()
    {
        $liste_annonces = $this->annoncesStorageStub->constructor_all_annonces("woman");
        $this->view->render_woman_annonces_page($liste_annonces);
    }

    /**
     * Requête à la vue pour : afficher la page des annonces pour hommes
     */
    public function make_man_annonces_page()
    {
        $liste_annonces = $this->annoncesStorageStub->constructor_all_annonces("man");
        $this->view->render_man_annonces_page($liste_annonces);
    }

    /**
     * Requête à la vue pour : afficher la page des annonces pour enfant
     */
    public function make_kids_annonces_page()
    {
        $liste_annonces = $this->annoncesStorageStub->constructor_all_annonces("kids");
        $this->view->render_kids_annonces_page($liste_annonces);
    }

    /**
     * Requête à la vue pour : afficher la page des annonces pour hommes
     */
    public function make_all_annonces_page()
    {
        $liste_annonces = $this->annoncesStorageStub->constructor_all_annonces("all");
        $this->view->render_all_annonces_page($liste_annonces);
    }

    /**
     * Requête à la vue pour : afficher la page de detail d'une annonce
     */
    public function make_detail_annonces_page()
    {

        $this->need_to_be_connected();          //Necessite d'être conencte pour y acceder


        /**
         * Verficiation que l'id rentré est valide
         */

        $id = $this->router->get_id();

        if(!is_numeric($id)) $this->router->home_redirection();
        if($id < 0)          $this->router->home_redirection();

        if(!empty($_POST)){ //Si un commentaire est envoyé on le traite
            $this->commentaires_poste_treatment($id);
        }


        $data_annnonce     = $this->annoncesStorageStub->get_annonce_detail($id);                   //Récupération des données de l'annonce 
        $data_utilisateur  = $this->accountStorageStub->get_pseudo_mail_telephone($data_annnonce->get_utilisateur_id()); //On récupres les informations du créateur

        if($data_annnonce === null) $this->router->home_redirection(); //Si on ne recupère rien de la base de donnée on repars sur la page d'accueil
        $commentaires_annonce = $this->commentairesStorageStub->constructor_commentaires_annonce($data_annnonce->get_annonces_id()); //On construie la liste des commentaires de l'annonces

        $file        = 'upload/annonces_pictures/'.$id.'/'.$id.".json";  //La ou sont stocké le chemin pour les image de notre annonce .
        $data_images = file_get_contents($file); 
        $image_path  = json_decode($data_images); 


        $this->view->render_detail_annonces_page($data_annnonce,$data_utilisateur,$commentaires_annonce,$image_path); //On affichage l'annonce
    }

    /**
     * On traite le commentaire si il est posté 
     */
    private function commentaires_poste_treatment($annonces_id)
    {
        $commentaire   = $this->request->getSecurityPostParam("commentaire","");
        $this->commentairesStorageStub->create_commentaire(new Commentaires(0,$_SESSION['user']->get_id(),$annonces_id,$commentaire,date("m.d.y"),$_SESSION['user']->get_pseudo()));

    }

}


?>