<?php


class CommentairesDatabase extends Database
{

    public function __construct()
    {
        parent::__construct();

    }

    public function create_commentaire_database($commentaire)
    {
        $requete = "INSERT INTO commentaires(   utilisateur_id,
                                                annonce_id,
                                                commentaire,
                                                date_poste,
                                                pseudo_utilisateur)

                                        VALUES( :utilisateur_id, 
                                                :annonce_id, 
                                                :commentaire, 
                                                :date_poste,
                                                :pseudo_utilisateur);";
        
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":utilisateur_id",$commentaire->get_utilisateur_id());
        $prepare->bindValue(":annonce_id",  $commentaire->get_annonce_id());
        $prepare->bindValue(":commentaire",$commentaire->get_commentaire());
        $prepare->bindValue(":date_poste",$commentaire->get_date_poste());
        $prepare->bindValue(":pseudo_utilisateur",$commentaire->get_pseudo_utilisateur());

        $prepare->execute();
        
    }

    public function delete_commentaire_database($commentaire_id)
    {
        $requete = "DELETE FROM commentaires WHERE id = :id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":id",$commentaire_id);
        $prepare->execute();

    }

    public function update_commentaire_database($commentaire)
    {
        $requete = "UPDATE commentaires SET commentaire = :commentaire WHERE id = :id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":id",$commentaire->get_id());
        $prepare->bindValue(":commentaire",$commentaire->get_commentaire());
     
        $prepare->execute();
    }

    public function update_commentaire_utilisateur_pseudo_database($pseudo_utilisateur,$utilisateur_id)
    {
        $requete = "UPDATE commentaires SET pseudo_utilisateur = :pseudo_utilisateur WHERE utilisateur_id = :utilisateur_id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":pseudo_utilisateur",$pseudo_utilisateur);
        $prepare->bindValue(":utilisateur_id",$utilisateur_id);
        $prepare->execute();
        
    }

    public function get_all_commentaires_database()
    {
        $requete = "SELECT * FROM commentaires ORDER BY id DESC";
        $prepare = $this->database->prepare($requete);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function get_annonce_commentaires_database($annonce_id)
    {
        $requete = "SELECT * FROM commentaires WHERE annonce_id = :annonce_id ORDER BY id DESC";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":annonce_id",$annonce_id);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function get_commentaires_database($commentaires_id)
    {
        $requete = "SELECT * FROM commentaires WHERE id = :commentaires_id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":commentaires_id",$commentaires_id);
        $prepare->execute();

        return $prepare->fetch();
    }


    public function get_utilisateur_commentaires_database($utilisateur_id)
    {


        $requete = "SELECT * FROM commentaires WHERE utilisateur_id = :utilisateur_id ORDER BY id DESC";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":utilisateur_id",$utilisateur_id);
        $prepare->execute();

        return $prepare->fetchAll();
    }

    public function is_commentaire_utilisateur_database($utilisateur_id,$commentaire_id)
    {

        $requete = "SELECT * FROM commentaires WHERE utilisateur_id = :utilisateur_id AND id = :commentaire_id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":utilisateur_id",$utilisateur_id);
        $prepare->bindValue(":commentaire_id",$commentaire_id);
        $prepare->execute();

        return $this->is_requete_empty($prepare->fetch());


    }

    public function delete_annnonce_commentaire_database($annonce_id)
    {
            $requete = "DELETE FROM commentaires WHERE annonce_id = :annonce_id";
            $prepare = $this->database->prepare($requete);
            $prepare->bindValue(":annonce_id",$annonce_id);
            $prepare->execute();

    }

    

}


?>