<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

// Ruta del archivo donde se guardarán los pedidos
$filePath = 'pedidos.json';

// Comprobar si el archivo existe
if (!file_exists($filePath)) {
    file_put_contents($filePath, json_encode([])); // Crear un archivo vacío si no existe
}

// Leer los pedidos existentes
$existingOrders = json_decode(file_get_contents($filePath), true);

// Agregar el nuevo pedido
$existingOrders[] = $data;

// Guardar los pedidos actualizados
if (file_put_contents($filePath, json_encode($existingOrders, JSON_PRETTY_PRINT))) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
