<?php
interface  ConnectDB{
    public function getConnection();      
}

class ConnectDB_MySql implements ConnectDB{

    private $host="localhost";
    private $dbUser="root";
    private $dbPass="root";
    private $db="jobroad_workshop";
    private $pdo;
    private  $driverOptions ;

    public function __construct(){    
        $this->driverOptions = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         ];

         $this->getConnection();
    }

    public function getConnection(){
        
        try{            
            $this->pdo = new PDO('mysql:host='. $this->host .';dbname='. $this->db, $this->dbUser, $this->dbPass, $this->driverOptions);

        }catch(Exception $e){
            echo "Error Getting Connection: $e";           
            
        }
    }
    /*** Get the value of pdo */ 
    public function getPdo()
    {
        return $this->pdo;
    }
}