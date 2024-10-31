<?php
$databaseFile = 'delizia.db';

try {
    // Crear conexión a la base de datos
    $pdo = new PDO("sqlite:" . $databaseFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit(); // Termina la ejecución si hay un error de conexión
}
?>

