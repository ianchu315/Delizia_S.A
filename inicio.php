<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delizia S.A</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="nav">

        <a href="inicio.php" class="titulo">Delizia</a>

        <div class="cerrar_se">
            <a class="a" href="cerrar.php"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
        </div>

        <div class="selecciones">
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a href="./inicio.php">inicio</a>
            </button>
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a href="#locales">Locales</a>

            </button>
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <a href="cafeteria.html">Contactanos</a>
            </button>
        </div>
    </header>
    <br>
    <?php
session_start(); 
if (isset($_SESSION['nombre']) && isset($_SESSION['apellido'])) {
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    echo "<center><h2>Bienvenido, " . $nombre . " " . $apellido . "!</h2></center>";

} else {
    echo "Por favor, inicie sesión.";
    header("Location: login.php");
    exit;
}
?>
    <br>
    <h2>Encuentra tu lugar favorito en un solo lugar</h2>
    <br>
    
    <!-- Carrusel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/hamburgueseria.jpg" class="d-block w-100 carousel-img" alt="Imagen 1">
            </div>
            <div class="carousel-item">
                <img src="img/heladeria.jpg" class="d-block w-100 carousel-img" alt="Imagen 2">
            </div>
            <div class="carousel-item">
                <img src="img/restaurante.jpg" class="d-block w-100 carousel-img" alt="Imagen 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br>
    <br>
    <br>

    <!-- Sección de Locales -->
    <section id="locales" class="conteeiner">
        <h2 class="Locales">Locales</h2>
        <div class="roww">
            <!-- Locales cards -->
                    <div class="carta">
                            <img src="img/hamburgueseria.jpg" class="card-img-top" alt="Restaurante 1">
                            <div class="cpadding">
                                <h5 class="card-title">Nautilus</h5>
                                <p class="card-text">Disfruta de una experiencia gastronómica única en un ambiente acogedor y moderno</p>
                                <a href="carta_nautilus.php" class="btn btn-secondary">Ver la carta</a>
                            </div>
                    </div>
                     <!-- Locales cards -->
                     <div class="carta">
                        <img src="img/heladeria.jpg" class="card-img-top" alt="Restaurante 1">
                        <div class="cpadding">
                            <h5 class="card-title">Felicia</h5>
                            <p class="card-text">Relájate y diviértete con nuestra combinación irresistible de helados artesanales y cócteles innovadores</p>
                            <a href="carta_felicia.php" class="btn btn-secondary">Ver la carta</a>
                        </div>
                </div>
                 <!-- Locales cards -->
                 <div class="carta">
                    <img src="img/restaurante.jpg" class="card-img-top" alt="Restaurante 1">
                    <div class="cpadding">
                        <h5 class="card-title">Comedor Bartolomé</h5>
                        <p class="card-text">Sumérgete en una experiencia única donde cada bocado y sorbo te transportan a un momento de pura felicidad.</p>
                        <a href="carta_bartolome.php" class="btn btn-secondary">Ver la carta</a>
                    </div>
            </div>
                    
        </div>
    </section>

    <!-- <div id="MyModal"class="modal">
        <div class="modal-content">
            <div class="close-btn">
                <a class="modal_close" href="#">&times;</a>
            </div>

            <h1 class="h1-pop">A & G</h1>
            <img src="img/hamburgesa.jpg" alt="hamburgesa">
            <h2 class="h2-pop">Las mejores Hamburgesas ¡Acá!</h2>
            <p>
                ¡Disfruta de la mejor comida en un ambiente relajado y acogedor! Desde pastas italianas hechas con amor hasta una variedad
                de platos deliciosos. ¡Relájate con buena música y aromas a café mientras saboreas tu comida!
            </p>

            <a href="https://www.google.com.ar/maps/place/A+%26+G+Burger/@-33.3302737,-60.2234633,20.25z/data=!4m6!3m5!1s0x95b767926253b501:0xf1a9c5f4e78dfe4e!8m2!3d-33.3303069!4d-60.2235709!16s%2Fg%2F11vzzn5cgs?hl=es&entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank">¿Como llegar?</a>

        </div>
    </div>

    <div id="MyModa2"class="modal">
        <div class="modal-content">
            <div class="close-btn">
                <a class="modal_close" href="#">&times;</a>
            </div>

            <h1 class="h1-pop">Felicia</h1>
            <img src="img/helado.jpg" alt="helado">
            <h2 class="h2-pop">¡Sabores Artesanales!</h2>
            <p>
                ¡Sumérgete en un mundo de sabores artesanales 100% locales! Cada bocado es una explosión de frescura y calidad. Ven y prueba
                todos nuestros helados, ¡te encantarán sin importar el sabor que elijas!
            </p>

            <a href="https://www.google.com.ar/maps/place/Felicia+helados+%26+caf%C3%A9/@-33.3282173,-60.2172138,21z/data=!4m6!3m5!1s0x95b7678aa067e0e5:0xf49f857ece364cc!8m2!3d-33.328325!4d-60.2172237!16s%2Fg%2F11fpqsxcqv?hl=es&entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank">¿Como llegar?</a>

        </div>
    </div>

    <div id="MyModa3"class="modal">
        <div class="modal-content">
            <div class="close-btn">
                <a class="modal_close" href="#">&times;</a>
            </div>

            <h1 class="h1-pop">Comedor Bartolomé</h1>
            <img src="img/bar.jpg" alt="hamburgesa">
            <h2 class="h2-pop">¡Disfruta platos gourmet!</h2>
            <p>
                ¡Disfruta de la mejor comida en un ambiente relajado y acogedor!
                Desde pastas italianas hechas con amor hasta una variedad de platos deliciosos
            </p>

            <a href="https://www.google.com.ar/maps/place/Comedor+Bartolom%C3%A9/@-33.3281398,-60.2165334,20.75z/data=!4m6!3m5!1s0x95b767f6beb407e1:0xb795262dda1bb324!8m2!3d-33.3283256!4d-60.2164707!16s%2Fg%2F11pvhrx77q?hl=es&entry=ttu&g_ep=EgoyMDI0MDkwNC4wIKXMDSoASAFQAw%3D%3D" target="_blank">¿Como llegar?</a>

        </div>
    </div> -->

    <br>
    <br>
    <br>

    <footer>
        Delizia &copy; 2024 - Todos los derechos reservados
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
