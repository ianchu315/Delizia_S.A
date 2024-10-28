<?php
// guardar_carrito.php

// Recibir los datos del carrito
$data = file_get_contents("php://input");
$carritoArray = json_decode($data, true);

// Verificar si se pudo decodificar el JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(["success" => false, "message" => "Error en el JSON"]);
    exit;
}

// Guardar en archivo JSON en la carpeta 'data'
$result = file_put_contents('data/carrito.json', json_encode($carritoArray, JSON_PRETTY_PRINT));

// Comprobar si se guardó correctamente
if ($result === false) {
    echo json_encode(["success" => false, "message" => "Error al guardar el archivo"]);
} else {
    echo json_encode(["success" => true]);
}
?>


