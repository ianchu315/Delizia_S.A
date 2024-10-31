<?php
if ($_GET) {
    $orden = $_GET['orden'];
    $fecha = $_GET['fecha'];
    $fechaactual="Y-M-D";

if($fecha<=$fechaactual){
    // Nombre del archivo
    $nombredelarchivo = "comanda.json";

    // Verificar si el archivo ya existe y contiene datos
    if (file_exists($nombredelarchivo)) {
        // Leer el contenido existente
        $contenidoExistente = file_get_contents($nombredelarchivo);
        $comandas = json_decode($contenidoExistente, true); // Decodificar como arreglo asociativo
    } else {
        // Si el archivo no existe, inicializar un arreglo vacío
        $comandas = [];
    }
    // Agregar el nuevo pedido al arreglo
    $comandas[] = ["Pedido" => $orden, "Fecha" => $fecha];
    // Convertir el arreglo de vuelta a JSON
    $jsoncomanda = json_encode($comandas, JSON_PRETTY_PRINT);
    // Escribir el JSON en el archivo
    file_put_contents($nombredelarchivo, $jsoncomanda);
    echo '<script>alert("Comanda guardada correctamente.");</script>';
}else {
    echo '<script>alert("Establecer fecha posterior a la actual.");</script>';
}
}else {
    echo '<script>alert("No se recibieron datos.");</script>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Comanda</title>
</head>
<body>
    <form action="" method="get">
        <h1>Ingresar Orden:</h1>
        <input type="text" name="orden" required>
        <h1>Ingresar Fecha:</h1>
        <input type="date" name="fecha" required>
        <input type="submit" value="Mandar">
    </form>
</body>
</html>
