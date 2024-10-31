<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delizia S.A</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .tarjeta {
            width: 320px;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            font-family: Arial, sans-serif;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            background-color: #f8f9fa;
        }
        .nombre {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .cargo {
            font-size: 18px;
            color: #777;
            margin-top: 5px;
        }
        .descripcion {
            font-size: 14px;
            color: #555;
            margin-top: 10px;
        }
        .contacto {
            margin-top: 15px;
        }
        .contacto a {
            text-decoration: none;
            color: #007bff;
            font-size: 14px;
            display: block;
            margin-top: 5px;
        }
        .contacto a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header class="nav">
        <a href="inicio.php" class="titulo">Delizia</a>

        <div class="cerrar_se">
            <a class="a" href="cerrar.php"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
        </div>

        <div class="selecciones">
            <button><a href="./inicio.php">Inicio</a></button>
            <button><a href="#locales">Locales</a></button>
            <button><a href="contactos.php">Contactanos</a></button>
        </div>
    </header>

    <?php
    session_start(); 
    if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
        $nombre = $_SESSION['nombre'];
        $apellido = $_SESSION['apellido'];
        echo "<center><h2>Bueno Sr/a, " . htmlspecialchars($nombre) . " " . htmlspecialchars($apellido) . " nos alegra que quieras saber más de nosotros</h2></center>";
    } else {
        header("Location: login.php");
        exit;
    }
    ?>

    <div class="tarjeta">
        <div class="nombre">Carlos López</div>
        <div class="cargo">Propietario de Delizia</div>
        <div class="descripcion">
            Bienvenido a Delizia, donde la pasión por la comida se encuentra con el mejor servicio. Disfruta de nuestros platos artesanales en un ambiente acogedor.
        </div>
        
        <div class="contacto">
            <p>Contactos:</p>
            <a href="mailto:carlos.lopez@delizia.com">Correo: carlos.lopez@delizia.com</a>
            <a href="tel:+123456789">Teléfono: +123 456 789</a>
            <a href="https://linkedin.com/in/carloslopez" target="_blank">LinkedIn</a>
            <a href="https://instagram.com/delizia_restaurante" target="_blank">Instagram</a>
        </div>
    </div>
    <br>
    <br>
    <footer>
        Delizia &copy; 2024 - Todos los derechos reservados
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

