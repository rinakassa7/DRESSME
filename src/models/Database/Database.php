<?php

require_once('config/private/MYSQL_CONFIG.php');

class Database
{

    protected $database;

    public function __construct()
    {
        
        try{

            $this->database = new PDO("mysql:host=".MYSQL_HOST.";port=".MYSQL_PORT.";dbname=".MYSQL_DB.";charset=".MYSQL_CHARSET."","".MYSQL_USER."","".MYSQL_PASSWORD."");

        }catch(PDOException $error){

            echo $error->getMessage();
            exit();
            die();


        }

    }


    protected function is_requete_empty($data)
    {

        if(!empty($data)){
            return true;
        }else{
            return false;
        }

    }

    /**
     * Get the value of database
     */ 
    protected function get_database()
    {
        return $this->database;
    }

    /**
     * Set the value of database
     *
     * @return  self
     */ 
    public function setDatabase($database)
    {
        $this->database = $database;

        return $this;
    }
}



?>