<?php
class model
{
    public $db;
    public function __construct()
    {
        try{
            $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8",DB_USERNAME,DB_PASSWORD);

        }
        catch(Exception $e){
            echo "Database cannot connected.\r Check database parameters."."\r\nError: ".$e;
            exit();
        }

    }


}