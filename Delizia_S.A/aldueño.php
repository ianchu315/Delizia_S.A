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
    <title>Seleccionar Local</title>
</head>
<body>
    <h1>Selecciona un Local</h1>
    <form action="aldueño.php" method="POST">
        <label for="local">Que establecimiento deseas ver:</label>
        <select name="local" id="local" required>
            <option value="local1">Cafetería</option>
            <option value="local2">Heladería</option>
            <option value="local3">Restaurante</option>
        </select>
        
        <div class="form-group">
                <label for="contrasena"><h1>Introduzca la contraseña del local:</h1></label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
            </div>
        </div>
        
        <br><br>
        <button type="submit">Abrir Local</button>
    </form>
</body>
</html>
