<?php
require 'conexion.php';
// Procesar el inicio de sesión
if (isset($_POST['login'])) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contrasena = $_POST['contrasena']; // Este es el nombre correcto

    // Consulta para encontrar al usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :nombre AND apellido = :apellido");
    $stmt->execute([':nombre' => $nombre, ':apellido' => $apellido]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verificar la contraseña
        if (password_verify($contrasena, $usuario['contrasena'])) { 
            // Inicio de sesión exitoso
            $_SESSION['user'] = $usuario; // Almacenar datos del usuario en la sesión
            header('Location:inicio.html');
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado.');</script>";
    }
}

// Procesar el registro
if (isset($_POST['registrar'])) {
    $nombre = $_POST['nombre']; // Cambiar nombre_registro a nombre
    $apellido = $_POST['apellido']; // Cambiar apellido_registro a apellido
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Este es el nombre correcto

    // Verificar si el usuario ya existe
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE nombre = :nombre AND apellido = :apellido");
    $stmt->execute([':nombre' => $nombre, ':apellido' => $apellido]);
    $usuarioExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioExistente) {
        $message = "Cuenta existente. Intenta iniciar sesión.";
    } else {
        // Realizar la inserción
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, apellido, contrasena) VALUES (:nombre, :apellido, :contrasena)");
        $stmt->execute([':nombre' => $nombre, ':apellido' => $apellido, ':contrasena' => $contrasena]);
        echo "<script>alert('Registro exitoso. Ahora puedes iniciar sesión');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión / Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        body {
            background-image: url(img/fondo_login.jpg);
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <br><br>
    <div class="justify-content-center">
        <h1 class="titulo-login">Delizia</h1>
    </div>

    <br><br>

    <div class="justificado">
        <form id="myForm" action="login.php" method="post">
            <div class="container">
                <h2 style="color: white;">Inicio de Sesión</h2>
                <div class="input-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" required>
                    <label for="contrasena">Contraseña</label>
                    <div style="position: relative;">
                        <input type="password" name="contrasena" id="contrasena" required>
                        <i class="ri-eye-off-line login__eye" id="inputIcon"></i>   
                    </div> 
                </div>

                <br>

                <div class="sesion">
                    <button type="submit" name="login">Iniciar Sesión</button>
                </div>
                <div class="sesion">
                    <button type="submit" name="registrar">Registrar</button>
                </div>
            </div>
        </form>
    </div>

    <br><br><br><br>

    <script>
        const showHiddenPass = (inputPass, inputIcon) => {
            const input = document.getElementById(inputPass),
                  icon = document.getElementById(inputIcon);
                  
            icon.addEventListener('click', () => {
                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.add('ri-eye-line');
                    icon.classList.remove('ri-eye-off-line');
                } else {
                    input.type = 'password';
                    icon.classList.remove('ri-eye-line');
                    icon.classList.add('ri-eye-off-line');
                }
            });
        };
         
        showHiddenPass('contraseña', 'inputIcon');
        showHiddenPass('contraseña_registro', 'inputIconRegistro');
    </script>

    <!--<footer>
        Delizia &copy; 2024 - Todos los derechos reservados
    </footer>-->

</body>
</html>
