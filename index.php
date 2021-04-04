<?php

set_include_path('./src');
require_once('controllers/FrontController/FrontController.php');
    
session_start();

    $front_controller = new FrontController();

?>