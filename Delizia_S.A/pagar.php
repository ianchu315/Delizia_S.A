<?php
// Leer el contenido del archivo JSON
$jsonFile = 'data/carrito.json'; // Cambia esto a la ruta correcta
$carritoData = file_get_contents($jsonFile);
$carritoArray = json_decode($carritoData, true);

// Calcular el total
$total = 0;

foreach ($carritoArray as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}

// Mostrar la suma y un mensaje de compra
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Resumen de tu compra</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carritoArray as $producto): ?>
                <tr>
                    <td><?php echo htmlspecialchars($producto['titulo']); ?></td>
                    <td><?php echo $producto['cantidad']; ?></td>
                    <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                    <td>$<?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Total a pagar: $<?php echo number_format($total, 2); ?></h3>
        
        <div class="row">
            <div class="col-6">
                <form action="pagar.php" method="post">
                    <button type="submit" name="action" value="pagar" class="btn btn-primary">Pagar</button>
                </form>
            </div>
            <div class="col-6">
                <a href="carta_bartolome.php" class="btn btn-danger">Cancelar</a>
            </div>
        </div>

        <?php
        // Simulación de pago
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['action'] === 'pagar') {
                echo "<p class='mt-3'>¡Compra realizada con éxito! Gracias por tu pedido.</p>";
                // Aquí podrías agregar lógica adicional para procesar el pago
            }
        }
        ?>
    </div>
</body>
</html>


