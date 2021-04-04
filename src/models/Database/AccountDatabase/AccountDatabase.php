<?php


require_once('models/Database/Database.php');

class AccountDatabase extends Database
{

    public function __construct()
    {
        parent::__construct();

    }

    public function create_utilisateur_database($account)
    {

        $requete = "INSERT INTO utilisateurs (prenom, 
                                              nom, 
                                              pseudo, 
                                              sexe, 
                                              email, 
                                              telephone, 
                                              password, 
                                              status, 
                                              profil_picture_path, 
                                              nombre_annonces_poste, 
                                              nombre_commentaires_poste,
                                              date_inscription)

                                        VALUES (:prenom, 
                                                :nom, 
                                                :pseudo, 
                                                :sexe, 
                                                :email, 
                                                :telephone, 
                                                :password, 
                                                :status, 
                                                :profil_picture_path, 
                                                :nombre_annonces_poste, 
                                                :nombre_commentaires_poste,
                                                :date_inscription);";

        $prepare = $this->database->prepare($requete);

        $prepare->bindValue(":prenom",$account->get_prenom());
        $prepare->bindValue(":nom",$account->get_nom());
        $prepare->bindValue(":pseudo",$account->get_pseudo());
        $prepare->bindValue(":email",$account->get_email());
        $prepare->bindValue(":telephone",$account->get_telephone());
        $prepare->bindValue(":sexe",$account->get_sexe());
        $prepare->bindValue(":password",$account->get_password());
        $prepare->bindValue(":status",$account->get_status());
        $prepare->bindValue(":profil_picture_path",$account->get_profil_picture_path());
        $prepare->bindValue(":nombre_annonces_poste",$account->get_nombre_annonces_poste());
        $prepare->bindValue(":nombre_commentaires_poste",$account->get_nombre_commentaires_poste());
        $prepare->bindValue(":date_inscription",$account->get_date_inscription());

        $prepare->execute();

    }

    public function delete_utilisateur_database($account)
    {
        $requete = "DELETE FROM utilisateurs WHERE id = :id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue("id",$account->get_id());
        $prepare->execute();

    }

    public function update_utilisateurs_database($account)
    {

        $requete = "UPDATE utilisateurs SET prenom                = :prenom, 
                                            nom                   = :nom, 
                                            pseudo                = :pseudo, 
                                            email                 = :email,
                                            telephone             = :telephone,
                                            sexe                  = :sexe,
                                            password              = :password,
                                            status                = :status,
                                            profil_picture_path   = :profil_picture_path,
                                            nombre_annonces_poste = :nombre_annonces_poste,
                                            nombre_commentaires_poste = :nombre_commentaires_poste,
                                            date_inscription          = :date_inscription";

        $prepare = $this->database->prepare($requete);

        $prepare->bindValue(":prenom",$account->get_prenom());
        $prepare->bindValue(":nom",$account->get_nom());
        $prepare->bindValue(":pseudo",$account->get_pseudo());
        $prepare->bindValue(":email",$account->get_email());
        $prepare->bindValue(":telephone",$account->get_telephone());
        $prepare->bindValue(":sexe",$account->get_sexe());
        $prepare->bindValue(":password",$account->get_password());
        $prepare->bindValue(":status",$account->get_status());
        $prepare->bindValue(":profil_picture_path",$account->get_profil_picture_path());
        $prepare->bindValue(":nombre_annonces_poste",$account->get_nombre_annonces_poste());
        $prepare->bindValue(":nombre_commentaires_poste",$account->get_nombre_commentaires_poste());
        $prepare->bindValue(":date_inscription",$account->get_date_inscription());

        $prepare->execute();

    }

    public function get_annonce_utilisateur_data($id)
    {

        $requete = "SELECT pseudo,email,telephone FROM utilisateurs WHERE id = :id";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":id",$id);
        $prepare->execute();
        
        return $prepare->fetch();

    }


    public function get_utilisateur_data($pseudo,$email)
    {

        $requete = "SELECT * FROM utilisateurs WHERE pseudo = :pseudo OR email = :email";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":pseudo",$pseudo);
        $prepare->bindValue(":email",$email);
        $prepare->execute();
        return $prepare->fetch();

    }



    public function is_utilisateur_exist($pseudo)
    {

        $requete = "SELECT * FROM utilisateurs WHERE pseudo = :pseudo";
        $prepare = $this->database->prepare($requete);
        $prepare->bindValue(":pseudo",$pseudo);
        $prepare->execute();

        return $this->is_requete_empty($prepare->fetch());

    }




    

}


?>