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
        <h1 class="bg-secondary">Nautilus</h1>
    </div>

    <div class="row">
        <main class="mt-5 col-8">
            <div class="row">
            <article class="col-6">
                    <div class="card">
                        <div class="card-body">
                        <h2 style="text-align: center;">Cafetería</h2>
                        <ul>
                            <li class="list">
                                <h5 class="card-title">Café chico</h5>
                                <p class="lead d-inline">$700</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Café chico" data-precio="700">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title ">Café jarrita</h5>
                                <p class="lead d-inline">$850</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Café jarrita" data-precio="850">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Café Doble</h5>
                                <p class="lead d-inline">$1.100</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Café Doble" data-precio="1100">+</button>
                            </li> 
                            <li class="list">
                                <h5 class="card-title">Chocolatada</h5>
                                <p class="lead d-inline">$1.600</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Chocolatada" data-precio="1600">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Cappuccino</h5>
                                <p class="lead d-inline">$1.600</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Cappuccino" data-precio="1600">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Submarino</h5>
                                <p class="lead d-inline">$1.800</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Submarino" data-precio="1800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Café Bombón (Café con leche condesada)</h5>
                                <p class="lead d-inline">$1.800</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Café Bombón" data-precio="1800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Mocaccino</h5>
                                <p class="lead d-inline">$1.800</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Mocaccino" data-precio="1800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Nutellate (Café con Nutella)</h5>
                                <p class="lead d-inline">$1.800</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Nutellate" data-precio="1800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Macchiato de Caramelo (Café con crema y caramelo.)</h5>
                                <p class="lead d-inline">$1.800</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Macchiato de Caramelo" data-precio="1800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Café Vienés (Café conleche y crema Chantilly)</h5>
                                <p class="lead d-inline">$1.800</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Café Vienés" data-precio="1800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Chocolate Caliente</h5>
                                <p class="lead d-inline">$2.200</p>
                                <button class="btn btn-primary btn-sm ml-2" data-comida="Chocolate Caliente" data-precio="2200">+</button>
                            </li>
                        </ul>
                        </div>
                    </div>
                </article>
                <article class="col-6">
                    <div class="card">
                        <div class="card-body">
                        <h2 style="text-align: center;">Desayunos</h2>
                        <ul>
                            <li class="list">
                                <h5 class="card-title">Medialuna (dulce o salada)</h5>
                                <p class="lead d-inline">$650</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="medialuna" data-precio="650">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Medialuna rellena de dulce de leche</h5>
                                <p class="lead d-inline">$1.200</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Medialuna rellena de dulce de leche" data-precio="1200">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Medialuna rellena de jamón y queso</h5>
                                <p class="lead d-inline">$1.200</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Medialuna rellena de jamón y queso" data-precio="1200">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Medialuna rellena de Nutella</h5>
                                <p class="lead d-inline">$1.200</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Medialuna rellena de Nutella" data-precio="1200">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Tostadas (dip queso crema y dip mermelada)</h5>
                                <p class="lead d-inline">$2.800</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Tostadas" data-precio="2800">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Tostadas de Waffle (Dip de queso crema y Dip de DDL)</h5>
                                <p class="lead d-inline">$3.000</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Tostadas de Waffle" data-precio="3000">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Tostado de Waffle (Con mayonesa o ketchup)</h5>
                                <p class="lead d-inline">$3.500</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Tostado de Waffle" data-precio="3500">+</button>
                            </li>
                            <li class="list">
                                <h5 class="card-title">Tostado de Pan Clasico o Carlitos</h5>
                                <p class="lead d-inline">$4.900</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Tostado de Pan Clasico o Carlitos" data-precio="4900">+</button>
                            </li>  
                            <li class="list">
                                <h5 class="card-title">Tostado de Pan Clasico con Pollo</h5>
                                <p class="lead d-inline">$5.800</p>
                                <button class="btn btn-primary btn-sm ml-3" data-comida="Tostado de Pan Clasico con Pollo" data-precio="5800">+</button>
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
                            <h2 style="text-align: center;">Pancakes</h2>
                            <ul>
                                <li class="list">
                                    <h5 class="card-title">Banana Chips</h5>
                                    <p class="lead d-inline">$7.800</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Banana Chips" data-precio="7800">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">Tropical Pancakes</h5>
                                    <p class="lead d-inline">$7.800</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Tropical Pancakes" data-precio="7800">+</button>
                                </li> 
                                <li class="list">
                                    <h5 class="card-title">Red Valvet</h5>
                                    <p class="lead d-inline">$8.500</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Red Valvet" data-precio="8500">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">Triple Chocolate Pancakes</h5>
                                    <p class="lead d-inline">$8.500</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Triple Chocolate Pancakes" data-precio="8500">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">Nutella Pancakes</h5>
                                    <p class="lead d-inline">$8.500</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Nutella Pancakes" data-precio="8500">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">Chocolate Fudge Pancakes</h5>
                                    <p class="lead d-inline">$9.500</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Chocolate Fudge Pancakes" data-precio="9500">+</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </article>
                <article class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h2 style="text-align: center;">MilkShakes</h2>
                            <ul>
                                <li class="list">
                                    <h5 class="card-title">ChocoBrownie</h5>
                                    <p class="lead d-inline">$6.200</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="ChocoBrownie" data-precio="6200">+</button>
                                </li>
                                <li class="list">
                                    <h5 class="card-title">BananaShake</h5>
                                    <p class="lead d-inline">$6.200</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="BananaShake" data-precio="6200">+</button>
                                </li>  
                                <li class="list">
                                    <h5 class="card-title">ChocoOreo</h5>
                                    <p class="lead d-inline">$6.400</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="ChocoOreo" data-precio="6400">+</button>
                                </li> 
                                <li class="list">
                                    <h5 class="card-title">Nautilus Shake</h5>
                                    <p class="lead d-inline">$6.500</p>
                                    <button class="btn btn-primary btn-sm ml-3" data-comida="Nautilus Shake" data-precio="6500">+</button>
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
    <script src="script.js"></script>
    
</body>
</html>