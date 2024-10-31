<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

// Ruta del archivo donde se guardarán los pedidos
$filePath = 'cartanautilus.json';

// Comprobar si el archivo existe
if (!file_exists($filePath)) {
    file_put_contents($filePath, json_encode([])); // Crea un archivo vacío si no existe
}
$currentOrders = json_decode(file_get_contents($filePath), true);

// Agregar el nuevo pedido
$currentOrders[] = $data;

// Guardar los pedidos actualizados
if (file_put_contents($filePath, json_encode($currentOrders))) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => 'No se pudo guardar el pedido.']);
}
?>
