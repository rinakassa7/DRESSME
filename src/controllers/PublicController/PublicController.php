<?php

require_once('controllers/Controller.php');

class PublicController extends Controller
{
   
    public function __construct($router,$request)
    {
        parent::__construct($router,$request);
    }

    public function make_home_page()
    {
        $this->view->render_home_page();
    }

    public function make_about_page()
    {
        $this->view->render_about_page();
    }


    public function make_complement_page()
    {
        $this->view->render_complement_page();
    }

}


    

?>