<?php


interface CommentairesStorage
{

    public function create_commentaire($commentaire);
    public function delete_commentaire($commentaire_id);
    public function update_commentaire($commentaire);

    public function get_all_commentaires();
    public function get_annonce_commentaires($annonce_id);
    public function get_utilisateur_commentaires($utilisateur_id);

    public function update_utilisateur_commentaires_pseudo($pseudo_utilisateur,$utilisateur_id);

    public function is_commentaire_utilisateur($utilisateur_id,$commentaire_id);

    public function delete_annnonce_commentaire($annonce_id);

    public function constructor_commentaires_annonce($annonce_id);
    public function constructor_commentaires_utilisateur($utilisateur_id);
    
}


?>