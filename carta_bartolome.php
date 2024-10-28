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
            <a class="a" href="login.html"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
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

    <div class="row">
        <main class="mt-5 col-8">
            <div class="row">
                <article class="col-6">
                    <div class="card">
                        <div class="card-body">
                        <h2 style="text-align: center;">Bebidas</h2>
                        <ul>
                            <li class="list">
                                <h5 class="card-title">Agua con gas</h5>
                                <p class="lead d-inline">$2.100</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Agua con gas" data-precio="2100">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Agua sin gas</h5>
                                <p class="lead d-inline">$2.100</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Agua sin gas" data-precio="2100">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Agua saborizada</h5>
                                <p class="lead d-inline">$2.100</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Agua saborizada" data-precio="2100">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Gaseosa (linea Pepsi)</h5>
                                <p class="lead d-inline">$2.100</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Gaseosa (linea Pepsi)" data-precio="2100">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Mojito sin alcohol</h5>
                                <p class="lead d-inline">$3.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Mojito sin alcohol" data-precio="3000">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Limonada</h5>
                                <p class="lead d-inline">$7.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Limonada" data-precio="7000">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Pomelada</h5>
                                <p class="lead d-inline">$7.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Pomelada" data-precio="7000">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Maracuyá</h5>
                                <p class="lead d-inline">$9.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Maracuyá" data-precio="9000">+</button>
                            </li>  
                        </ul>
                        </div>
                    </div>
                </article>
                <article class="col-6">
                    <div class="card">
                        <div class="card-body">
                        <h2 style="text-align: center;">Pastas</h2>
                        <ul>
                            <li class="list">
                                <h5 class="card-title">Cintas Verdes</h5>
                                <p class="lead d-inline">$8.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="cintas verdes" data-precio="8000">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title ">Tallarines</h5>
                                <p class="lead d-inline">$8.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="tallarines" data-precio="8000">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">MAc&Cheese</h5>
                                <p class="lead d-inline">$8.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="MAc&Cheese" data-precio="8000">+</button>
                            </li> 
                            <li class="list">
                                <h5 class="card-title">Ñoquis de papa</h5>
                                <p class="lead d-inline">$8.500</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Ñoquis de papa" data-precio="8500">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Sorrentinos de calabaza</h5>
                                <p class="lead d-inline">$9.800</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Sorrentinos de calabaza" data-precio="9800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Sorrentinos Jamon y Queso</h5>
                                <p class="lead d-inline">$10.000</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Sorrentinos Jamon y Queso" data-precio="10000">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Malfatti de espinaca y ricotta</h5>
                                <p class="lead d-inline">$10.000</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Malfatti de espinaca y ricotta" data-precio="10000">+</button>
                            </li>
                        </ul>
                        </div>
                    </div>
                </article>
            </div>
            <div class="row">
            <article class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 style="text-align: center;">Cervezas (en botellas)</h2>
                            <ul>
                                <li class="list">
                                    <h5 class="card-title">Corona</h5>
                                    <p class="lead d-inline">$3.500</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Corona" data-precio="3500">+</button>
                                </li> 
                                <li class="list">
                                    <h5 class="card-title">Andes Origen</h5>
                                    <p class="lead d-inline">$3.200</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Andes Origen" data-precio="3200">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">Stella Artois (720cc)</h5>
                                    <p class="lead d-inline">$5.700</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Stella Artois (720cc) artois botella" data-precio="5700">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">Patagonia</h5>
                                    <p class="lead d-inline">$5.900</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Patagonia" data-precio="5900">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">Stella Artois</h5>
                                    <p class="lead d-inline">$6.100</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="cerveza stella artois botella" data-precio="6100">+</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 style="text-align: center;">Cervezas (en pinta)</h2>
                            <ul>
                                <li class="list">
                                    <h5 class="card-title">Andes</h5>
                                    <p class="lead d-inline">$3.600</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Andes" data-precio="3600">+</button>
                                </li> 
                                <li class="list">
                                    <h5 class="card-title">Patagonia</h5>
                                    <p class="lead d-inline">$3.600</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Patagonia" data-precio="3600">+</button>
                                </li> 
                                <li class="list">
                                    <h5 class="card-title">Stella Artois</h5>
                                    <p class="lead d-inline">$3.600</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Stella Artois" data-precio="3600">+</button>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </article>
            </div>
        </main> 
                
        
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
    <script src="./script.js"></script>
    
</body>
</html>
