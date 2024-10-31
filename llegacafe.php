<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cafetería: Nautilus</title>
</head>
<body>

<header class="nav">
    <a href="" class="titulo">Delizia</a>
    <center><a href="acafeteria.php" class="titulo">Menu</a></center>
    <div class="cerrar_se">
        <a class="a" href="aldueño.php"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
    </div>
</header>

<center><h2>Cafetería: Nautilus</h2></center>

<?php
$archivoJson = "cartanautilus.json";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jsonContenido = file_get_contents($archivoJson);
    $resultado = json_decode($jsonContenido, true);

    if ($resultado !== null) {
        if (isset($_POST['indice_comanda_entregado'])) {
            // Marcar como entregado
            $indiceComanda = $_POST['indice_comanda_entregado'];
            $resultado[$indiceComanda]['entregado'] = true;
        } elseif (isset($_POST['indice_comanda_borrar'])) {
            // Eliminar la comanda
            $indiceComanda = $_POST['indice_comanda_borrar'];
            unset($resultado[$indiceComanda]);
            $resultado = array_values($resultado); // Reindexar el array
        }
        
        file_put_contents($archivoJson, json_encode($resultado, JSON_PRETTY_PRINT));
    }
}

if (file_exists($archivoJson)) {
    $jsonContenido = file_get_contents($archivoJson);
    $resultado = json_decode($jsonContenido);

    if ($resultado !== null && !empty($resultado)) {
        foreach ($resultado as $index => $comanda) {
            $nombre = htmlspecialchars($comanda->user->nombre);
            $apellido = htmlspecialchars($comanda->user->apellido);
            $hora = htmlspecialchars($comanda->hora);
            $mesa = htmlspecialchars($comanda->mesa);
            $total = htmlspecialchars($comanda->total);
            $entregado = !empty($comanda->entregado);

            echo "<h2>Comanda " . ($entregado ? "✓" : "") . "</h2>";
            echo "<p><strong>Nombre:</strong> $nombre $apellido</p>";
            echo "<p><strong>Hora:</strong> $hora</p>";
            echo "<p><strong>Mesa:</strong> $mesa</p>";
            echo "<p><strong>Total:</strong> $$total</p>";

            echo "<h3>Items:</h3>";
            echo "<ul>";
            foreach ($comanda->items as $item) {
                $itemNombre = htmlspecialchars($item->nombre ?? $item->nombreb);
                $itemDescripcion = htmlspecialchars($item->descripcion ?? $item->descripcionb);
                $itemPrecio = htmlspecialchars($item->precio ?? $item->preciob);
                $itemCantidad = htmlspecialchars($item->cantidad);

                echo "<li>$itemNombre - Descripción: $itemDescripcion - Precio: $$itemPrecio - Cantidad: $itemCantidad</li>";
            }
            echo "</ul>";

            // Botón "Marcar como Entregado"
            if (!$entregado) {
                echo "<form method='post' class='d-inline'>";
                echo "<input type='hidden' name='indice_comanda_entregado' value='$index'>";
                echo "<button type='submit' class='btn btn-success'>Marcar como Entregado</button>";
                echo "</form>";
            }

            // Botón "Eliminar Comanda"
            echo "<form method='post' class='d-inline ml-2'>";
            echo "<input type='hidden' name='indice_comanda_borrar' value='$index'>";
            echo "<button type='submit' class='btn btn-danger'>Eliminar Comanda</button>";
            echo "</form><hr>";
        }
    } else {
        echo "<p>No hay comandas disponibles.</p>";
    }
} else {
    echo "<p>El archivo JSON no existe.</p>";
}
?>

</body>
</html>

