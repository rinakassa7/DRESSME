<?php

require_once('models/AuthentificationManager/AuthentificationManager.php');
require_once('models/ErrorsDisplay/ErrorsDisplay.php');

require_once('views/PrivateView.php');
require_once('views/View.php');

class Controller
{
    protected $router;
    protected $request;
    protected $authentificationManager;
    protected $errorsDisplay;
    protected $view;

    public function __construct($router, $request)
    {
        $this->router                  = $router;
        $this->request                 = $request;
        $this->authentificationManager = new AuthentificationManager();
        $this->errorsDisplay           = new ErrorsDisplay($this->router);

        if($this->authentificationManager->is_utilisateur_connected()){

            $this->view = new PrivateView($this->router,$this->errorsDisplay,$this->authentificationManager);

        }else{

            $this->view = new View($this->router,$this->errorsDisplay,$this->authentificationManager);

        }


    }


    public function cant_be_connected()
    {
        if($this->authentificationManager->is_utilisateur_connected()){

            $this->router->home_redirection();
        
        }
    }

    public function need_to_be_connected()
    {
        if(!$this->authentificationManager->is_utilisateur_connected()){

            $this->router->register_redirection();
        
        }
    }

}


?>