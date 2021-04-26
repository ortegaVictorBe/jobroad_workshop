<?php
interface  ConnectDB{
    public function getConnection();      
}

class ConnectDB_MySql implements ConnectDB{

    private $host="localhost";
    private $dbUser="root";
    private $dbPass="root";
    private $db="jobroad_workshop";

   //Production
    // private $host="localhost";
    // private $dbUser="c2161152";
    // private $dbPass="DEbu24pasa";
    // private $db="c2161152_jobroad";

    //Production Jobroad Hosting
    // private $host="ID313600_jobroad.db.webhosting.be";
    // private $dbUser="ID313600_jobroad";
    // private $dbPass="Jobroad2021";
    // private $db="ID313600_jobroad";

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