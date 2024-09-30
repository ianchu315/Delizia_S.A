<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comdeor Bartolomé</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="carta.css">
</head>
<body>

    <header class="nav">

        <a href="inicio.html" class="titulo">Delizia</a>

        <div class="cerrar_se">
            <a class="a" href="login.html"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
        </div>

        <!-- <div id="tema">
            <button class="dark-togller" 
            aria-label="Toggle color mode" 
            title="Toggle color mode" 
            data-theme-toggle>
            <div class="toggler-icon"></div>
        </button>
        </div> -->

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
            
    <form id="menu-form" method="POST" action="pagar.php">
        
                <h2 class="h2">Menú del bar</h2>

                <br>
                
                    <div class="row">

                        <h2>Pastas</h2>

                        <div class="comidas">..
                        
                            <div class="comi">
                                <!-- Comida 1 -->
                                <div class="columna">
                                    <label for="item1">Cintas Verdes - $8.000</label>
                                    <input type="checkbox" id="1" name="nombres[]" value="Cintas Verdes" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8000" onclick="checks(1)">
                                </div>
                                <!-- Comida 2 -->
                                <div class="columna">
                                    <label for="item2">Tallarines - $8.000</label>
                                    <input type="checkbox" id="2" name="nombres[]" value="Tallarines" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8000" onclick="checks(2)">
                                </div>
                                <!-- Comida 3 -->
                                <div class="columna">
                                    <label for="item3">MAc&Cheese - $8.000</label>
                                    <input type="checkbox" id="3" name="nombres[]" value="MAc&Cheese" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8000" onclick="checks(3)">
                                </div>
                                <!-- Comida 4 -->
                                <div class="columna">
                                    <label for="item4">Malfatti de espinaca y ricotta - $10.000</label>
                                    <input type="checkbox" id="4" name="nombres[]" value="Malfatti de espinaca y ricotta" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="10000" onclick="checks(4)">
                                </div>
                                <!-- Comida 5 -->
                                <div class="columna">
                                    <label for="item5">Ñoquis de papa - $8.500</label>
                                    <input type="checkbox" id="5" name="nombres[]" value="Ñoquis de papa" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8500" onclick="checks(5)">
                                </div>
                                <!-- Comida 1 -->
                                <div class="columna">
                                    <label for="item1">Sorrentinos de calabaza - $9.800</label>
                                    <input type="checkbox" id="6" name="nombres[]" value="Sorrentinos de calabaza" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="9800" onclick="checks(6)">
                                </div>
                                <!-- Comida 2 -->
                                <div class="columna">
                                    <label for="item2">Sorrentinos de Jamon y Queso - $10.000</label>
                                    <input type="checkbox" id="7" name="nombres[]" value="Sorrentinos de Jamon y Queso" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="10000" onclick="checks(7)">
                                </div>
                                                                
                            </div>

                            <div class="comi">
                                <!-- Comida 1 -->
                                <div class="columna">
                                    <label for="item1">Cintas Verdes - $8.000</label>
                                    <input type="checkbox" id="10" name="nombres[]" value="Cintas Verdes" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8000" onclick="checks(10)">
                                </div>
                                <!-- Comida 2 -->
                                <div class="columna">
                                    <label for="item2">Tallarines - $8.000</label>
                                    <input type="checkbox" id="11" name="nombres[]" value="Tallarines" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8000" onclick="checks(11)">
                                </div>
                                <!-- Comida 3 -->
                                <div class="columna">
                                    <label for="item3">MAc&Cheese - $8.000</label>
                                    <input type="checkbox" id="12" name="nombres[]" value="MAc&Cheese" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8000" onclick="checks(12)">
                                </div>
                                <!-- Comida 4 -->
                                <div class="columna">
                                    <label for="item4">Malfatti de espinaca y ricotta - $10.000</label>
                                    <input type="checkbox" id="13" name="nombres[]" value="Malfatti de espinaca y ricotta" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="10000" onclick="checks(13)">
                                </div>
                                <!-- Comida 5 -->
                                <div class="columna">
                                    <label for="item5">Ñoquis de papa - $8.500</label>
                                    <input type="checkbox" id="14" name="nombres[]" value="Ñoquis de papa" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="8500" onclick="checks(14)">
                                </div>
                                <!-- Comida 1 -->
                                <div class="columna">
                                    <label for="item1">Sorrentinos de calabaza - $9.800</label>
                                    <input type="checkbox" id="15" name="nombres[]" value="Sorrentinos de calabaza" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="9800" onclick="checks(15)">
                                </div>
                                <!-- Comida 2 -->
                                <div class="columna">
                                    <label for="item2">Sorrentinos de Jamon y Queso - $10.000</label>
                                    <input type="checkbox" id="16" name="nombres[]" value="Sorrentinos de Jamon y Queso" style="display:none">
                                    <input type="checkbox" name="comida[]" class="checkbox" value="10000" onclick="checks(16)">
                                </div>
                                                                
                            </div>
                            
                        </div> 

                        <h2>Bebidas </h2>
                        
                        <div class="bebidas">
                            
                            <div class="bebi">
                                <!-- Bebida 1 -->
                                <div class="columna">
                                    <label for="item1">Limonada - $7.000</label>
                                    <input type="checkbox" id="17" name="nombres2[]" value="Limonada" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="7000" onclick="checks(17)">
                                </div>
                                <!-- Bebida 2 -->
                                <div class="columna">
                                    <label for="item2">Pomelada - $7.000</label>
                                    <input type="checkbox" id="18" name="nombres2[]" value="Pomelada" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="7000" onclick="checks(18)">
                                </div>
                                <!-- Bebida 3 -->
                                <div class="columna">
                                    <label for="item3">Maraacuyá - $9.000</label>
                                    <input type="checkbox" id="19" name="nombres2[]" value="Maraacuyá" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="8000" onclick="checks(19)">
                                </div>
                                <!-- Bebida 4 -->
                                <div class="columna">
                                    <label for="item4">Mojito sin alcohol - $3.000</label>
                                    <input type="checkbox" id="20" name="nombres2[]" value="Mojito sin alcohol" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="3000" onclick="checks(20)">
                                </div>
                                <!-- Bebida 5 -->
                                <div class="columna">
                                    <label for="item5">Agua con gas - $2.100</label>
                                    <input type="checkbox" id="21" name="nombres2[]" value="Agua con gas" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="2100" onclick="checks(21)">
                                </div>
                                <!-- Bebida 6-->
                                <div class="columna">
                                    <label for="item1">Agua sin gas - $2.100</label>
                                    <input type="checkbox" id="22" name="nombres2[]" value="Agua sin gas" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="2100" onclick="checks(22)">
                                </div>
                                <!-- Bebida 7 -->
                                <div class="columna">
                                    <label for="item2">Agua saborizada - $2.100</label>
                                    <input type="checkbox" id="23" name="nombres2[]" value="Agua saborizada" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="2100" onclick="checks(23)">
                                </div>
                                <!-- Bebida 8 -->
                                <div class="columna">
                                    <label for="item1">Gaseosa <b>linea Pepsi</b> - $2.100</label>
                                    <input type="checkbox" id="24" name="nombres2[]" value="Gaseosa" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="2100" onclick="checks(24)">
                                </div>                         
                            </div>
                            <br>
                            <div class="bebi">
                                <br>
                                <h5>Cervezas (en pinta)</h5>
                                <!-- Bebida 9 -->
                                <div class="columna">
                                    <label for="item1">Andes - $3.600</label>
                                    <input type="checkbox" id="25" name="nombres2[]" value="Andes" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="3600" onclick="checks(25)">
                                </div>
                                <!-- Bebida 10 -->
                                <div class="columna">
                                    <label for="item2">Patagonia - $3.600</label>
                                    <input type="checkbox" id="26" name="nombres2[]" value="Patagonia" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="3600" onclick="checks(26)">
                                </div>
                                <!-- Bebida 11 -->
                                <div class="columna">
                                    <label for="item3">Stella Artois - $3.600</label>
                                    <input type="checkbox" id="27" name="nombres2[]" value="Stella Artois" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="3600" onclick="checks(27)">
                                </div>
                                <br>
                                <h5>Cervezas(en botellas)</h5>
                                <!-- Bebida 12 -->
                                <div class="columna">
                                    <label for="item4">Andes Origen - $5.200</label>
                                    <input type="checkbox" id="28" name="nombres2[]" value="Andes Origen" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="5200" onclick="checks(28)">
                                </div>
                                <!-- Bebida 13 -->
                                <div class="columna">
                                    <label for="item5">Patagonia - $5.900</label>
                                    <input type="checkbox" id="29" name="nombres2[]" value="Patagonia" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="5900" onclick="checks(29)">
                                </div>
                                <!-- Bebida 14 -->
                                <div class="columna">
                                    <label for="item5">Stella Artois - $6.100</label>
                                    <input type="checkbox" id="30" name="nombres2[]" value="Stella Artois" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="6100" onclick="checks(30)">
                                </div>
                                <!-- Bebida 15 -->
                                <div class="columna">
                                    <label for="item2">Stella Artois <b>720 cc</b> - $5700</label>
                                    <input type="checkbox" id="31" name="nombres2[]" value="Stella Artois <b>720 cc</b>" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="5700" onclick="checks(31)">
                                </div>
                                <!-- Bebida 16   -->
                                <div class="columna">
                                    <label for="item1">Coronita - $3.500</label>
                                    <input type="checkbox" id="32" name="nombres2[]" value="Coronita" style="display:none">
                                    <input type="checkbox" name="bebida[]" class="checkbox" value="3500" onclick="checks(32)">
                                </div>
                                <input id="carracatoa" type="hidden" name="total" value="0">                         
                            </div>
                            
                        </div> 

                    </div>

                    <div class="total">
                        <h4>Total a pagar: $<span id="total">0</span></h4>
                        <input class="pagar" type="submit" value="Enviar">
                    </div>

    </form>

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
