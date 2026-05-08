<?php

Class Connection {

private $host = "localhost:8111";
private $user = "root";
private $pass = '';
private $dbname = "itsm";
protected $con;
 


            public function openConnection()
             {
               try
                 {
          $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user,$this->pass);
          $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         // echo("Connected ");

          return $this->con;
                  }
               catch (PDOException $e)   
                 {
                     echo "There is some problem in connection: " . $e->getMessage();
                 }
             }
public function closeConnection() {
     $this->con = null;
  }



}



?>