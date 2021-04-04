<?php



require_once('models/AccountManager/AccountStorage.php');
require_once('models/AccountManager/Account.php');
require_once('models/Database/AccountDatabase/AccountDatabase.php');

class AccountStorageStub implements AccountStroage
{

    private $accountDatabase;

    public function __construct($accountDatabase)
    {
        $this->accountDatabase = $accountDatabase;
    }


    public function create_utilisateur($account)
    {
        $this->accountDatabase->create_utilisateur_database($account);
    }

    public function delete_utilisateur($account)
    {
        $this->accountDatabase->delete_utilisateur_database($account);

    }

    public function update_utilisateur($account)
    {
        $this->accountDatabase->update_utilisateurs_database($account);
    }

    public function constructor_utilisateur($pseudo,$email)
    {

        $data_utilisateur = $this->accountDatabase->get_utilisateur_data($pseudo,$email);

        $account =  new Account(
            $data_utilisateur['id'],
            $data_utilisateur['prenom'],
            $data_utilisateur['nom'],
            $data_utilisateur['pseudo'],
            $data_utilisateur['password'],
            $data_utilisateur['email'],
            $data_utilisateur['telephone'],
            $data_utilisateur['sexe'],
            $data_utilisateur['status'],
            $data_utilisateur['date_inscription'],
            $data_utilisateur['profil_picture_path'],
            $data_utilisateur['nombre_annonces_poste'],
            $data_utilisateur['nombre_commentaires_poste']
        );

        return $account;

    }

    public function is_utilisateur_exist($pseudo)
    {
        return $this->accountDatabase->is_utilisateur_exist($pseudo);
    }

    public function get_pseudo_mail_telephone($utilisateur_id)
    {

        return $this->accountDatabase->get_annonce_utilisateur_data($utilisateur_id);


    }


}



?>