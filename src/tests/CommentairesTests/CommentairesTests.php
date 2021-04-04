<?php

require_once('models/CommentairesManager/Commentaires.php');
require_once('models/CommentairesManager/CommentairesStorageStub.php');
require_once('models/Database/CommentairesDatabase/CommentairesDatabase.php');


class CommentairesTests
{

    private $commentairesDatabase;
    private $commentairesStorageStub;

    public function __construct()
    {
        $this->CommentairesDatabase     = new CommentairesDatabase();
        $this->CommentairesStorage      = new CommentairesStorageStub($this->commentairesDatabase);

    }

    public function tests_create()
    {
        $commentaire = new Commentaires(1000000,1000000,1000000,"test_creation",date("m.d.y"),"test_creation");
        $this->CommentairesStorage->create_commentaire($commentaire);
    }

    public function test_delete()
    {
        $commentaire = new Commentaires(1000000,1000000,1000000,"test_creation",date("m.d.y"),"test");
        $this->CommentairesStorage->delete_commentaire($commentaire);

    }

    public function update_test()
    {
        $commentaire = new Commentaires(1000000,1000000,1000000,"test_update",date("m.d.y"),"test_update");
        $this->CommentairesStorage->update_commentaire_database($commentaire);

    }

}


?>