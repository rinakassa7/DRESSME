<?php


require_once('models/AnnoncesManager/AnnoncesStorage.php');
require_once('models/AnnoncesManager/Annonces.php');
require_once('models/Database/AnnoncesDatabase/AnnoncesDatabase.php');

class AnnoncesStorageStub implements AnnoncesStorage
{
    private $annoncesDatabase;

    public function __construct($annoncesDatabase)
    {
        $this->annoncesDatabase = $annoncesDatabase;
    }


    public function create_annonce($annonce)
    {
        $this->annoncesDatabase->create_annonce_database($annonce);
    }

    public function update_annonce($annonce)
    {
        $this->annoncesDatabase->update_annonce_database($annonce);

    }

    public function delete_annonce($annonce_id) 
    {
        $this->annoncesDatabase->delete_annonce_database($annonce_id);
    }


    public function constructor_all_annonces($type_annonce)
    {

        $liste_annonces_construct = array();

        switch($type_annonce){
            case "woman":
                $liste_annonces_database  = $this->annoncesDatabase->get_all_woman_annonces_database();
            break;

            case "man":
                $liste_annonces_database  = $this->annoncesDatabase->get_all_man_annonces_database();
            break;

            case "kids":
                $liste_annonces_database  = $this->annoncesDatabase->get_all_kids_annonces_database();
            break;

            case "all":
                $liste_annonces_database  = $this->annoncesDatabase->get_all_annonces_database();
            break;

            default:
                $liste_annonces_database  = $this->annoncesDatabase->get_all_annonces_database();
            break;
        }


        if(!empty($liste_annonces_database)){

            foreach($liste_annonces_database as $annonce)
            {

                array_push($liste_annonces_construct,new Annonces(
                    $annonce['id'],
                    $annonce['utilisateur_id'],
                    $annonce['description'],
                    $annonce['type_annonce'],
                    $annonce['prix'],
                    $annonce['miniature_path'],
                    $annonce['type'],
                    $annonce['type_detail'],
                    $annonce['etat'],
                    $annonce['date_publication']
                ));

            }
        }

        return $liste_annonces_construct;

    }


    public function get_utilisateur_annonces($utilisateur_id)
    {
        $liste_annonces_database  = $this->annoncesDatabase->get_utilisateur_annonces_database($utilisateur_id);
        $liste_annonces_construct = array();

        foreach($liste_annonces_database as $annonce)
        {

            array_push($liste_annonces_construct,new Annonces(
                $annonce['id'],
                $annonce['utilisateur_id'],
                $annonce['description'],
                $annonce['type_annonce'],
                $annonce['prix'],
                $annonce['miniature_path'],
                $annonce['type'],
                $annonce['type_detail'],
                $annonce['etat'],
                $annonce['date_publication']
            ));

        }
        return $liste_annonces_construct;
    }


 

    public function get_annonce_detail($annonce_id)
    {
        $data_annonce =  $this->annoncesDatabase->get_annonces_by_id_database($annonce_id);

        return new Annonces(
            $data_annonce['id'],
            $data_annonce['utilisateur_id'],
            $data_annonce['description'],
            $data_annonce['type_annonce'],
            $data_annonce['prix'],
            $data_annonce['miniature_path'],
            $data_annonce['type'],
            $data_annonce['type_detail'],
            $data_annonce['etat'],
            $data_annonce['date_publication']
        ); 


    }

    public function get_last_annonce_id(){
        return $this->annoncesDatabase->get_last_annonce_id_database();
    }


    public function is_annonce_utilisateur($utilisateur_id,$annonce_id)
    {
        return $this->annoncesDatabase->is_annonce_utilisateur_database($utilisateur_id,$annonce_id);
    }


}


?>