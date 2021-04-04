<?php



class AuthentificationManager
{

    public function connect_utilisateur($account, $pseudo, $password)
    {

        if($account->get_pseudo() !== $pseudo) return false;

            if(password_verify($password,$account->get_password()))
            {
                
                $_SESSION['user'] = $account;

                return true;

            }

        return false;
    
    }

    public function logout_utilisateur()
    {
        session_destroy();
    }

    public function is_utilisateur_connected()
    {

        if(key_exists("user",$_SESSION))
        {
            return true;
        }

        return false;

    }

    public function is_utilisateur_admin()
    {
        if($this->is_utilisateur_connected())
        {
            if($_SESSION['user']->get_status() === "admin")
            {
                return true;
            }
        }

        return false;

    }


}



?>