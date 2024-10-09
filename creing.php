<?php
$servidor = "localhost";
$usuario = "root";
$contraseña = "";

session_start();

include 'Conexion.php';

$conexion = new Conexion();

// funcionamiento de loggin

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['crear'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['password'];

         if (!empty($usuario) && !empty($contrasena)) {
            $sql = "SELECT * FROM test WHERE nombre = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$usuario]);
            $busqueda = $stmt->fetchAll();

            if (count($busqueda) === 0) {
                $sql = "INSERT INTO test (nombre, password) VALUES (?, ?)";
                $stmt = $conexion->prepare($sql);
                $stmt->execute([$usuario, $contrasena]);

                echo "Usuario creado correctamente";
                header("Location: inicio.php");
                exit();
            } else {
                echo "Usuario ya existente";
            }
        } else {
            echo "Por favor, complete todos los campos.";
        }
    }

    if (isset($_POST['ingresar'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['password'];

        if (!empty($usuario) && !empty($contrasena)) {
            $sql = "SELECT * FROM test WHERE nombre = ? AND password = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->execute([$usuario, $contrasena]);
            $resultado = $stmt->fetchAll();

            if (count($resultado) > 0) {
                $_SESSION['usuario'] = $usuario;
                header("Location:inicio.php");
                exit();
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        } else {
            echo "Por favor, complete todos los campos.";
        }
    }
}
?>