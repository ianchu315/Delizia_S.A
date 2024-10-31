<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comdeor Bartolomé</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="carrito.css">
</head>
<body>

    <header class="nav">

        <a href="inicio.html" class="titulo">Delizia</a>

        <div class="cerrar_se">
            <a class="a" href="login.html"><img src="./img/boton.png" alt="boton">Cerrar sesión</a>
        </div>

        <div class="selecciones">
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a class="a" href="restaurantes.html">Restaurantes</a>
            </button>
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a class="a" href="heladeria.html">Heladeria</a>

            </button>
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a class="a" href="cafeteria.html">Cafeteria</a>
            </button>
        </div>
    </header>

    <div class="text-center p-2 mt-4">
        <h1 class="bg-secondary">Comedor Bartolome</h1>
    </div>
    <h2>Listado de Bebidas</h2>
    <?php
$archivo="acafeteria.json";
//Nombre del archivo
$archivoAbierto=fopen($archivo,"r");
//Abro el archivo en modo lectura(r) si el archivo no existe devuelve false
$contenido=fread($archivoAbierto,filesize($archivo));
//Lee el archivo de tamaño del $archivo(Nombre que se le puso a la variable archivo que se quiere leer)
$resultado=json_decode($contenido);
//json_decode=Descifra la informacion que este en formato JSON que esta en el array $jsonContenido
//print_r($resultado);
foreach($resultado as $orden){
 //$jsonContenido==$resultado==$persona
 /*foreach es una estructura de control en PHP que permite iterar sobre cada elemento de un array u objeto, 
 ejecutando un bloque de código para cada uno de ellos*/
    echo ($orden->nombre)."<br/>".($orden->descripcion)."<br/>".($orden->precio);
}
?>     
<?php
$archivo="acafeteriabebidas.json";
//Nombre del archivo
$archivoAbierto=fopen($archivo,"r");
//Abro el archivo en modo lectura(r) si el archivo no existe devuelve false
$contenido=fread($archivoAbierto,filesize($archivo));
//Lee el archivo de tamaño del $archivo(Nombre que se le puso a la variable archivo que se quiere leer)
$resultado=json_decode($contenido);
//json_decode=Descifra la informacion que este en formato JSON que esta en el array $jsonContenido
//print_r($resultado);
foreach($resultado as $orden){
 //$jsonContenido==$resultado==$persona
 /*foreach es una estructura de control en PHP que permite iterar sobre cada elemento de un array u objeto, 
 ejecutando un bloque de código para cada uno de ellos*/
    echo ($orden->nombreb)."<br/>".($orden->descripcionb)."<br/>".($orden->preciob);
}
?> 
        <aside class="col-4" style="position: sticky;">
            <section class="container mt-5">
                <ul class="list-group" id="carrito"></ul>
            </section>
                
            <footer id="footer" class="container mt-3">
                <template id="templateFooter">
                    <div class="card">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <p class="lead mb-0">TOTAL: $<span>1500</span></p>
                            <a href="./pagar.php"><button class="btn btn-outline-primary">Finalizar Compra</button></a>
                            <input type="hidden" id="mensajero" value="" name="arrayCarrito[]">
                        </div>
                    </div>
                </template>
            </footer>
        
            <template id="template">
                <li class="list-group-item text-uppercase bg-secondary text-white">
                    <span class="badge bg-primary rounded-pill align-middle">14</span>
                    <span class="lead align-middle">A list item</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <p class="lead mb-0">Total: $<span>200</span></p>
                    </div>
                    <div>
                        <button class="btn btn-sm btn-success">Agregar</button>
                        <button class="btn btn-sm btn-danger">Quitar</button>
                    </div>
                </li>
            </template>
        </aside>
    </div>
    

    <br>
    <br>

    <footer class="footer-real">
        Delizia &copy; 2024 - Todos los derechos reservados
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
    
</body>
</html>
