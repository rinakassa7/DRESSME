<?php


class Request
{

    public function __construct()
    {
        
    }

    
    public function getSecurityPostParam($key,$default=null)
    {

    
        if(isset($_POST[$key]) && !empty($_POST[$key])){

            return htmlspecialchars($_POST[$key], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5);

        }else{

            return htmlspecialchars($default, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5);

        }

    }

    public function getSecurityGetParam($key,$default=null)
    {

        
        if(isset($_GET[$key]) && !empty($_GET[$key])){

            return htmlspecialchars($_GET[$key], ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5);

        }else{

            return htmlspecialchars($default, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5);

        }

    }

}


?>