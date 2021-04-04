<?php

class ErrorsDisplay
{

    private $router;

    public function __construct($router)
    {
        
        $this->router = $router;

    }


    public function error_login_form()
    {
        
        $error_message_liste = array(
            "0" => "",
            "1" => "Connexion échoué",
        );

        return $this->return_error_message($error_message_liste,$this->router->get_error_id());


    }

    public function error_register_form()
    {
        
        $error_message_liste = array(
            "0" => "",
            "1" => "Erreur champ Prenom",
            "2" => "Erreur de Nom",
            "3" => "Erreur champ pseudo",
            "4" => "Pseudo ou Email déja pris",
            "5" => "Erreur champ mot de passe",
            "6" => "Mot de passe non identique",
            "7" => "Erreur champ email",
            "8" => "Erreur champ téléphone",
            "9" => "Sexe invalide",


        );

        return $this->return_error_message($error_message_liste,$this->router->get_error_id());

    }

    public function error_profil_update_form()
    {

        $error_message_liste = array(
            "0" => "",
            "1" => "Erreur champ Prenom",
            "2" => "Erreur de Nom",
            "3" => "Erreur champ pseudo",
            "4" => "Pseudo ou Email déja pris",
            "5" => "Erreur champ email",
            "6" => "Erreur champ téléphone",
            "7" => "Sexe invalide",

        );

        return $this->return_error_message($error_message_liste,$this->router->get_error_id());

    }

    public function error_commentaires_form()
    {

    }

    public function error_annonces_form()
    {

        $error_message_liste = array(
            
            "0" => "",
            "1" => "Erreur description",
            "2" => "Erreur prix",
            "3" => "Erreur type de l'annonce",
            "4" => "Erreur type de produits",
            "5" => "Erreur detail de produit",
            "6" => "Erreur etat du produit",
            "7" => "Erreur dans l'upload des images",
            "8" => "Erreur dans l'upload de la miniature",

        );

        return $this->return_error_message($error_message_liste,$this->router->get_error_id());

    }


    public function return_error_message($error_message_liste,$id){

       
        if(key_exists($id,$error_message_liste)){
                return $error_message_liste[$id];
                

        }else{
                return $error_message_liste["0"];
        }
    }
        

}

?>