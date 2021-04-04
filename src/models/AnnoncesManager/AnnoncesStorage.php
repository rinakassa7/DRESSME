<?php


interface AnnoncesStorage
{

    public function create_annonce($annonce);
    public function update_annonce($annonce);
    public function delete_annonce($annonce_id);
    public function constructor_all_annonces($type_annonce);
    
    public function get_utilisateur_annonces($utilisateur_id);
    public function get_annonce_detail($annonce_id);
    public function get_last_annonce_id();
 
    public function is_annonce_utilisateur($utilisateur_id,$annonce_id);

}



?>