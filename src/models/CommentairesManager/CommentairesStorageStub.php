<?php


require_once('models/CommentairesManager/Commentaires.php');
require_once('models/CommentairesManager/CommentairesStorage.php');

class CommentairesStorageStub implements CommentairesStorage
{

    private $commentairesDatabase;

    public function __construct($commentairesDatabase)
    {
        $this->commentairesDatabase = $commentairesDatabase;
    }

    public function create_commentaire($commentaire)
    {
        $this->commentairesDatabase->create_commentaire_database($commentaire);   
    }

    public function delete_commentaire($commentaire_id)
    {
        $this->commentairesDatabase->delete_commentaire_database($commentaire_id);   

    }

    public function update_commentaire($commentaire)
    {
        $this->commentairesDatabase->update_commentaire_database($commentaire);   

    }

    public function constructor_commentaires_annonce($annonce_id)
    {
                
        $liste_commentaires_construct = array();

        foreach($this->get_annonce_commentaires($annonce_id) as $commentaire){

            array_push($liste_commentaires_construct,new Commentaires(
                $commentaire['id'],
                $commentaire['utilisateur_id'],
                $commentaire['annonce_id'],
                $commentaire['commentaire'],
                $commentaire['date_poste'],
                $commentaire['pseudo_utilisateur']
            ));

        }

        return $liste_commentaires_construct;
    }

    public function constructor_commentaires_utilisateur($utilisateur_id)
    {
        
        $liste_commentaires_construct = array();

        foreach($this->get_utilisateur_commentaires($utilisateur_id) as $commentaire){

            array_push($liste_commentaires_construct,new Commentaires(
                $commentaire['id'],
                $commentaire['utilisateur_id'],
                $commentaire['annonce_id'],
                $commentaire['commentaire'],
                $commentaire['date_poste'],
                $commentaire['pseudo_utilisateur']
            ));

        }

        return $liste_commentaires_construct;

    }

    public function get_commentaires($commentaire_id){

        $commentaire = $this->commentairesDatabase->get_commentaires_database($commentaire_id);

        return new Commentaires(
            $commentaire['id'],
            $commentaire['utilisateur_id'],
            $commentaire['annonce_id'],
            $commentaire['commentaire'],
            $commentaire['date_poste'],
            $commentaire['pseudo_utilisateur']
        );

    }

    
    public function update_utilisateur_commentaires_pseudo($pseudo_utilisateur,$utilisateur_id){
      
        $this->commentairesDatabase->update_commentaire_utilisateur_pseudo_database($pseudo_utilisateur,$utilisateur_id);
    
    }

    public function get_all_commentaires()
    {
        return $this->commentairesDatabase->get_all_commentaires_database();
    }

    public function get_annonce_commentaires($annonce_id)
    {
        return $this->commentairesDatabase->get_annonce_commentaires_database($annonce_id);
    }

    public function get_utilisateur_commentaires($utilisateur_id)
    {
        return $this->commentairesDatabase->get_utilisateur_commentaires_database($utilisateur_id);
    }

    public function is_commentaire_utilisateur($utilisateur_id,$commentaire_id){
        return $this->commentairesDatabase->is_commentaire_utilisateur_database($utilisateur_id,$commentaire_id);

    }

    public function delete_annnonce_commentaire($annonce_id){
        $this->commentairesDatabase->delete_annnonce_commentaire_database($annonce_id);
    }



}

?>