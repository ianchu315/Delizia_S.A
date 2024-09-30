<?php

class Conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $contraseña = "";
    private $conexion;

    public function __construct() {
        try {
            $this->conexion = new PDO("mysql:host=$this->servidor;dbname=prueba", $this->usuario, $this->contraseña);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Falla de conexión: " . $e->getMessage();
        }
    }

    public function prepare($sql) {
        return $this->conexion->prepare($sql);
    }
    
    public function consultar($sql) {
        $sentencia = $this->conexion->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}
?>