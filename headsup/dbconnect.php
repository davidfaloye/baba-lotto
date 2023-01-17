<?php
   class Database{
     public $hostname = "localhost";
     public $user = "yourhostname";
     public $password = "dbpassword";
     public $database = "databasename";
     public $databasex;
 
    
   function connectDB(){
     $this->databasex= new mysqli($this->hostname, $this->user, $this->password, $this->database);
        if ($this->databasex->connect_error) {
            die("Connection failed: " . $this->databasex->connect_error);
        }
  } 




  }

?>
