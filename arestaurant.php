<?php
$nombre = "";
$descripcion = "";
$precio = "";
$nombreb = "";
$descripcionb = "";
$preciob = "";
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Agregar Comida
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio'])) {
        $nombre = htmlspecialchars(trim($_POST['nombre']));
        $descripcion = htmlspecialchars(trim($_POST['descripcion']));
        $precio = floatval(trim($_POST['precio']));

        $archivoAgregar = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio
        ];
        $rutaArchivo = 'arestaurant.json';

        if (file_exists($rutaArchivo)) {
            $contenidoActual = file_get_contents($rutaArchivo);
            $datos = json_decode($contenidoActual, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $datos[] = $archivoAgregar;
            } else {
                $message = "Error al decodificar el JSON.";
            }
        } else {
            $datos = [$archivoAgregar];
        }
        if (file_put_contents($rutaArchivo, json_encode($datos, JSON_PRETTY_PRINT)) !== false) {
            $message = "Datos de comida guardados exitosamente.";
            $nombre = "";
            $descripcion = "";
            $precio = "";
        } else {
            $message = "Error al guardar los datos de comida.";
        }
    }

    // Agregar Bebida
    // Procesar el formulario de bebidas
if (isset($_POST['nombreb']) && isset($_POST['descripcionb']) && isset($_POST['preciob'])) {
    $nombreb = htmlspecialchars(trim($_POST['nombreb']));
    $descripcionb = htmlspecialchars(trim($_POST['descripcionb']));
    $preciob = floatval(trim($_POST['preciob']));

        $archivoAgregarBebida = [
            'nombreb' => $nombreb,
            'descripcionb' => $descripcionb,
            'preciob' => $preciob
        ];
        $rutaArchivoBebidas = 'arestaurantbebidas.json';

        if (file_exists($rutaArchivoBebidas)) {
            $contenidoActualBebidas = file_get_contents($rutaArchivoBebidas);
            $datosBebidas = json_decode($contenidoActualBebidas, true);
            
            if (json_last_error() === JSON_ERROR_NONE) {
                $datosBebidas[] = $archivoAgregarBebida;
            } else {
                $message = "Error al decodificar el JSON de bebidas.";
            }
        } else {
            $datosBebidas = [$archivoAgregarBebida];
        }

        if (file_put_contents($rutaArchivoBebidas, json_encode($datosBebidas, JSON_PRETTY_PRINT)) !== false) {
            $message .= " Datos de bebida guardados exitosamente.";
            $nombreb = "";
            $descripcionb = "";
            $preciob = "";
        } else {
            $message .= " Error al guardar los datos de bebida.";
        }
}

    // Eliminar Comida
    if (isset($_POST['eliminar_nombre'])) {
        $nombreAEliminar = $_POST['eliminar_nombre'];
        $rutaArchivo = 'arestaurant.json';
        
        if (file_exists($rutaArchivo)) {
            $contenidoActual = file_get_contents($rutaArchivo);
            $datos = json_decode($contenidoActual, true);
            
            foreach ($datos as $index => $pedido) {
                if ($pedido['nombre'] === $nombreAEliminar) {
                    unset($datos[$index]);
                    break;
                }
            }

            $datos = array_values($datos);
            file_put_contents($rutaArchivo, json_encode($datos, JSON_PRETTY_PRINT));
            $message = "Objeto eliminado correctamente.";
        }
    }

    // Eliminar Bebida
    if (isset($_POST['eliminar_nombreb'])) {
        $nombrebAEliminar = $_POST['eliminar_nombreb'];
        $rutaArchivoBebidas = 'arestaurantbebidas.json';
        
        if (file_exists($rutaArchivoBebidas)) {
            $contenidoActualBebidas = file_get_contents($rutaArchivoBebidas);
            $datosBebidas = json_decode($contenidoActualBebidas, true);

            foreach ($datosBebidas as $index => $pedidob) {
                if ($pedidob['nombreb'] === $nombrebAEliminar) {
                    unset($datosBebidas[$index]);
                    break;
                }
            }

            $datosBebidas = array_values($datosBebidas);
            file_put_contents($rutaArchivoBebidas, json_encode($datosBebidas, JSON_PRETTY_PRINT));
            $message .= " Objeto de bebida eliminado correctamente.";
        }
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
    <title>Restaurant:Bartolome</title>
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
<center><h2>Restaurant:Bartolome</h2></center>
    <h2>Menú Comida:</h2>
    <div class="text-center">
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
            <br>
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" value="<?php echo htmlspecialchars($descripcion); ?>" required>
            <br>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" value="<?php echo htmlspecialchars($precio); ?>" required>
            <br>
            <button class="btn btn-secondary" type="submit">Agregar</button>
        </form>
    </div>

    <h2>Menú Bebidas:</h2>
    <div class="text-center">
        <form action="" method="post">
            <label for="nombreb">Nombre:</label>
            <input type="text" name="nombreb" id="nombreb" value="<?php echo htmlspecialchars($nombreb); ?>" required>
            <br>
            <label for="descripcionb">Descripción:</label>
            <input type="text" name="descripcionb" id="descripcionb" value="<?php echo htmlspecialchars($descripcionb); ?>" required>
            <br>
            <label for="preciob">Precio:</label>
            <input type="number" name="preciob" id="preciob" value="<?php echo htmlspecialchars($preciob); ?>" required>
            <br>
            <button class="btn btn-secondary" type="submit">Agregar</button>
        </form>
    </div>

    <!-- Mensaje de respuesta -->
    <?php if (!empty($message)): ?>
        <div class="alert alert-info text-center m-3" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <h2>Listado de Comidas</h2>
    <div class="text-center">
    <?php
    $archivo = "arestaurant.json";
    if (file_exists($archivo)) {
        $contenido = file_get_contents($archivo);
        $resultado = json_decode($contenido, true); 

        if ($resultado !== null) {
            foreach ($resultado as $pedido) {
                echo "Nombre: " . htmlspecialchars($pedido['nombre']) . "<br>";
                echo "Descripción: " . htmlspecialchars($pedido['descripcion']) . "<br>";
                echo "Precio: " . htmlspecialchars($pedido['precio']) . "<br>";
                echo '<form method="post">
                        <input type="hidden" name="eliminar_nombre" value="' . htmlspecialchars($pedido['nombre']) . '">
                        <button class="btn btn-secondary" type="submit">Eliminar</button>
                      </form><br>';
            }
        }
    }
    ?>
    </div>

    <h2>Listado de Bebidas</h2>
    <div class="text-center">
    <?php
    $archivob = "arestaurantbebidas.json";
    if (file_exists($archivob)) {
        $contenidob = file_get_contents($archivob);
        $resultadob = json_decode($contenidob, true); 
        if ($resultadob !== null) {
            foreach ($resultadob as $pedidob) {
                echo "Nombre: " . htmlspecialchars($pedidob['nombreb']) . "<br>";
                echo "Descripción: " . htmlspecialchars($pedidob['descripcionb']) . "<br>";
                echo "Precio: " . htmlspecialchars($pedidob['preciob']) . "<br>";
                echo '<form method="post">
                        <input type="hidden" name="eliminar_nombreb" value="' . htmlspecialchars($pedidob['nombreb']) . '">
                        <button class="btn btn-secondary" type="submit">Eliminar</button>
                      </form><br>';
            }
        }
    }
    ?>
    </div>
</body>
</html>

