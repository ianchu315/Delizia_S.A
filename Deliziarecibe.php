<?php
$archivo = "comanda.json";

// Verifica si el archivo existe antes de abrirlo
if (file_exists($archivo)) {
    // Abro el archivo en modo lectura (r)
    $archivoAbierto = fopen($archivo, "r");
    // Lee el contenido del archivo
    $contenido = fread($archivoAbierto, filesize($archivo));
    // Cierra el archivo
    fclose($archivoAbierto);

    // Decodifica el contenido JSON como un arreglo
    $resultado = json_decode($contenido);

    // Verifica si json_decode tuvo éxito y si $resultado es un arreglo
    if (json_last_error() === JSON_ERROR_NONE && is_array($resultado)) {
        // Itera sobre el arreglo para acceder a cada objeto
        foreach ($resultado as $pedido) {
            // Verifica que el objeto tenga las propiedades esperadas
            if (isset($pedido->Pedido) && isset($pedido->Fecha)) {
                // Imprime los valores de Pedido y Fecha
                echo $pedido->Pedido . " " . $pedido->Fecha . "<br/>";
            } 
        }
    } else {
        echo "Error al decodificar JSON: " . json_last_error_msg();
    }
} else {
    echo '<script>alert("Archivo no existente.");</script>';;
}
?>
