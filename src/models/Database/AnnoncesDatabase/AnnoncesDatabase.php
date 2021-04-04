<?php

require_once('models/Database/Database.php');

class AnnoncesDatabase extends Database
{


    public function __construct()
    {
        parent::__construct();
    }

    public function create_annonce_database($annonce)
    {
        $requete = "INSERT INTO annonces(utilisateur_id,  description,  type_annonce,  prix,  miniature_path,  type,  type_detail,  etat) 
                                 VALUES(:utilisateur_id, :description, :type_annonce, :prix, :miniature_path, :type, :type_detail, :etat); ";

        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":utilisateur_id",$annonce->get_utilisateur_id());
        $prepare->bindValue(":description",$annonce->get_description());
        $prepare->bindValue(":type_annonce",$annonce->get_type_annonce());
        $prepare->bindValue(":prix",$annonce->get_prix(),PDO::PARAM_INT);
        $prepare->bindValue(":miniature_path",$annonce->get_miniature_path());
        $prepare->bindValue(":type",$annonce->get_type());
        $prepare->bindValue(":type_detail",$annonce->get_type_detail());
        $prepare->bindValue(":etat",$annonce->get_etat());

        $prepare->execute();

    }

    public function delete_annonce_database($annonce_id)
    {
        $requete = "DELETE FROM annonces WHERE id = :id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":id",$annonce_id);
        $prepare->execute();
    }

    public function update_annonce_database($annonce)
    {
        $requete = "UPDATE annonces SET 
                                        description     = :description,
                                        type_annonce    = :type_annonce,
                                        prix            = :prix,
                                        miniature_path  = :miniature_path,
                                        type            = :type,
                                        type_detail     = :type_detail,
                                        etat            = :etat
                                        
                                        WHERE id        = :id";

$prepare = $this->database->prepare($requete);
        $prepare->bindValue(":description",$annonce->get_description());
        $prepare->bindValue(":type_annonce",$annonce->get_type_annonce());
        $prepare->bindValue(":prix",$annonce->get_prix());
        $prepare->bindValue(":miniature_path",$annonce->get_miniature_path());
        $prepare->bindValue(":type",$annonce->get_type());
        $prepare->bindValue(":type_detail",$annonce->get_type_detail());
        $prepare->bindValue(":etat",$annonce->get_etat());
        $prepare->bindValue(":id",$annonce->get_annonces_id());

        $prepare->execute();
    }

    public function get_all_annonces_database()
    {
        $requete = "SELECT * FROM annonces order by id desc";
        $prepare = $this->database->prepare($requete);
        $prepare->execute();
        return $prepare->fetchAll();
    
    }

    public function get_annonces_by_id_database($annonce_id)
    {
        $requete = "SELECT * FROM annonces WHERE id = :id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue("id",$annonce_id);
        $prepare->execute();
        return $prepare->fetch();
    
    }


    public function get_all_woman_annonces_database()
    {
        $requete = "SELECT * FROM annonces WHERE type_annonce = :type_annonce order by id desc";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":type_annonce","woman");
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function get_all_man_annonces_database()
    {
        $requete = "SELECT * FROM annonces WHERE type_annonce = :type_annonce order by id desc";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":type_annonce","man");
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function get_all_kids_annonces_database()
    {
        $requete = "SELECT * FROM annonces WHERE type_annonce = :type_annonce order by id desc";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":type_annonce","kids");
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function get_utilisateur_annonces_database($utilisateur_id)
    {
        $requete = "SELECT * FROM annonces WHERE utilisateur_id = :utilisateur_id order by id desc";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":utilisateur_id",$utilisateur_id);
        $prepare->execute();
        return $prepare->fetchAll();
    }

    public function is_annonce_utilisateur_database($utilisateur_id,$annonce_id)
    {

        $requete = "SELECT * FROM annonces WHERE utilisateur_id = :utilisateur_id AND id = :annonce_id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":utilisateur_id",$utilisateur_id);
        $prepare->bindValue(":annonce_id",$annonce_id);
        $prepare->execute();

        return $this->is_requete_empty($prepare->fetch());


    }

    public function get_last_annonce_id_database(){
        $requete = "SELECT MAX(id) FROM annonces";
        $prepare = $this->database->prepare($requete);
        $prepare->execute();
        return $prepare->fetch()["MAX(id)"];
    }

    

}


?>