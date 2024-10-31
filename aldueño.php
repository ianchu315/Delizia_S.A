<h2?php
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Heladeria:Felizia</title>
</head>
<body>

<header class="nav">

        <a href="inicio.html" class="titulo">Delizia</a>

        <div class="cerrar_se">
            <a class="a" href="login.html"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
        </div>

        <div class="selecciones">
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a href="inicio.html">Inicio</a>
            </button>
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a href="restaurantes.html">locales</a>

            </button>
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a href="cafeteria.html">Cafeteria</a>
            </button>
        </div>

    </header>
    <h2>Selecciona un Local</h2>
    <div class="text-center">
        <form action="aldueño.php" method="POST">
            <label for="local">Que establecimiento deseas ver:</label>
            <select name="local" id="local" required>
                <option value="local1">Cafetería</option>
                <option value="local2">Heladería</option>
                <option value="local3">Restaurante</option>
            </select>
            
            <div class="form-group">
                    <label for="contrasena"><h2>Introduzca la contraseña del local:</h2></label>
                    <input type="password" class="form-control m-5" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
            </div>
            <br><br>
            <button class=" btn btn-secondary" type="submit">Abrir Local</button>
        </form>
    </div>
            
</body>
</html>
