<?php

class Database {
    private $db;
  

    public function __construct() {
      try{
        $this->db=new PDO('sqlite:delizzia,db');

        $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
        echo "Error de conexion:".$e->getMessage();
        exit;
    }
    }
    public function getDB(){
        return $this->db;
    }
}
?>