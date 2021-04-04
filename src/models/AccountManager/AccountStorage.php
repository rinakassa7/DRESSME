<?php

interface AccountStroage
{

    public function create_utilisateur($account);
    public function delete_utilisateur($account);
    public function update_utilisateur($account);
    public function constructor_utilisateur($pseudo,$email);
    public function is_utilisateur_exist($pseudo);

}


?>