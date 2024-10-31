<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nautilus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="carrito.css">
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

    <div class="rowjustify-content-center">
        <h2>Comidas</h2>
        <div class="container my-5">
        <section class="d-flex align-items-center justify-content-center" id="loading">
            <!-- <strong>Loading...</strong>
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div> -->
        </section>
        <div class="row" id="card-dinamica"></div>
            <template id="template-card">
                <article class="col-md-6 col-lg-3 mb-3">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title text-primary lead"></h5>
                            <p class="desc"></p>
                            <p class="lead price text-secondary"></p>
                        </div>
                    </div>
                </article>
            </template>
        </div>
    </div>

    <div class="rowjustify-content-center">
        <h2>Bebidas</h2>
        <div class="container my-5">
            <section class="d-flex align-items-center justify-content-center" id="loading">
                <!-- <strong>Loading...</strong>
                <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div> -->
            </section>
            <div class="row" id="card-dinamica-dos"></div>
            <template id="template-card-dos">
                <article class="col-md-6 col-lg-3 mb-3">
                    <div class="card text-center shadow">
                        <div class="card-body">
                            <h5 class="card-title text-primary lead"></h5>
                            <p class="desc"></p>
                            <p class="lead price text-secondary"></p>
                        </div>
                    </div>
                </article>
            </template>
        </div>
    </div>

    <br>
    <br>

    <footer class="footer-real">
        Delizia &copy; 2024 - Todos los derechos reservados
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="productosNautilus.js"></script>
    
</body>
</html>
