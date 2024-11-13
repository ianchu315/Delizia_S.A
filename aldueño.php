<?php
$contraseña = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $local = $_POST['local'];
    $contraseña = $_POST['contrasena'];

    $contraseñas = [
        'local1' => 'Nautilus_2023',
        'local2' => 'Felicia_2024',
        'local3' => 'Bartolome_2025'
    ];

    if (array_key_exists($local, $contraseñas) && $contraseñas[$local] === $contraseña) {
        switch ($local) {
            case 'local1':
                header('Location: acafeteria.php');
                break;
            case 'local2':
                header('Location: aheladeria.php');
                break;
            case 'local3':
                header('Location: arestaurant.php');
                break;
        }
        exit();
        
    } else {
        echo "<script>alert('Contraseña incorrecta o selección de local inválida.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productos.css">
    <link rel="stylesheet" href="cartas.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Comanda General</title>
</head>
<body>

<header class="nav">

        <a style="margin-left: 46%" href="aldueño.php" class="titulo">Delizia</a>

        <div class="cerrar_se">
            <a class="a" href="aldueño.php"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
        </div>

    </header>

    <br>
    <h2>Selecciona un Local</h2>
    <br>

    <div class="text-center">
        <form action="aldueño.php" method="POST">
            <label for="local">Que establecimiento deseas ver:</label>
            <select name="local" id="local" required>
                <option value="local1">Cafetería</option>
                <br>
                <option value="local2">Heladería</option>
                <br>
                <option value="local3">Restaurante</option>
            </select>

            <br>
            
            <div class="justificado">
                    <label for="contrasena"><h2>Introduzca la contraseña del local:</h2></label>
                    <input style="max-width: 20%;" type="password" class="form-control m-5" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
            </div>
                <button class="borde-v" class="btn btn-secondary" type="submit">Abrir Local</button>
        </form>
    </div>
    <br>
    <br>
    <center>
           <h2>Cafeteria: Nautilus_2023</h2>
           <br>
           <h2>Heladeria: Felicia_2024</h2>
           <br>
           <h2>Restaurante: Bartolome_2025</h2>
           <br>
    </center>
</body>
</html>
