<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heladeria Felicia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="carrito.css">
</head>
<body>

<header class="nav">
    <a href="inicio.php" class="titulo">Delizia</a>
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
            <a href="restaurantes.html">Locales</a>
        </button>
        <button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <a href="cafeteria.html">Cafetería</a>
        </button>
    </div>
</header>

<div class="row justify-content-center">
    <h2>Comidas</h2>
    <div class="container my-5">
        <div class="row" id="card-dinamica"></div>
        <template id="template-card">
            <article class="col-md-6 col-lg-3 mb-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title text-primary lead"></h5>
                        <p class="desc"></p>
                        <p class="lead price text-secondary"></p>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-danger minus">-</button>
                            <span class="quantity mx-2">0</span>
                            <button class="btn btn-success plus">+</button>
                        </div>
                        <button class="btn btn-primary add-to-cart mt-2">Añadir a la orden</button>
                    </div> 
                </div>
            </article>
        </template>
    </div>
</div>

<div class="row justify-content-center">
    <h2>Bebidas</h2>
    <div class="container my-5">
        <div class="row" id="card-dinamica-dos"></div>
        <template id="template-card-dos">
            <article class="col-md-6 col-lg-3 mb-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title text-primary lead"></h5>
                        <p class="desc"></p>
                        <p class="lead price text-secondary"></p>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-danger minus">-</button>
                            <span class="quantity mx-2">0</span>
                            <button class="btn btn-success plus">+</button>
                        </div>
                        <button class="btn btn-primary add-to-cart mt-2">Añadir a la orden</button>
                    </div>
                </div>
            </article>
        </template>
    </div>
</div>  

<script>
    const cart = []; // Array para almacenar los platos elegidos

    document.addEventListener('DOMContentLoaded', () => {
        const cardDinamica = document.getElementById('card-dinamica');
        const cardDinamicaDos = document.getElementById('card-dinamica-dos');
        const totalElement = document.getElementById('total');

        // Función para cargar los platos desde el JSON
        async function loadPlatos() {
            const response = await fetch('aheladeria.json');
            const apiData = await response.json();

            apiData.forEach(item => {
                const template = document.getElementById('template-card').content.cloneNode(true);
                template.querySelector('.card-title').textContent = item.nombre;
                template.querySelector('.desc').textContent = item.descripcion;
                template.querySelector('.price').textContent = `$${item.precio}`;
                template.querySelector('.add-to-cart').addEventListener('click', () => addToCart(item));
                cardDinamica.appendChild(template);
            });
        }

        // Función para cargar las bebidas desde el JSON
        async function loadBebidas() {
            const response = await fetch('aheladeriabebidas.json');
            const apiData = await response.json();

            apiData.forEach(item => {
                const template = document.getElementById('template-card-dos').content.cloneNode(true);
                template.querySelector('.card-title').textContent = item.nombreb;
                template.querySelector('.desc').textContent = item.descripcionb;
                template.querySelector('.price').textContent = `$${item.preciob}`;
                template.querySelector('.add-to-cart').addEventListener('click', () => addToCart(item));
                cardDinamicaDos.appendChild(template);
            });
        }

        // Función para agregar platos al carrito
        function addToCart(item) {
            const cartItem = cart.find(cartItem => cartItem.nombre === item.nombre || cartItem.nombre === item.nombreb);
            if (cartItem) {
                cartItem.quantity += 1; // Aumenta la cantidad si ya existe en el carrito
            } else {
                cart.push({ ...item, quantity: 1 }); // Agrega el item con cantidad 1
            }
            updateTotal(); // Actualiza el total después de agregar el plato
            renderCart(); // Renderiza el carrito después de agregar el plato
        }

        // Función para actualizar el total
        function updateTotal() {
            const total = cart.reduce((acc, item) => {
                const price = parseFloat(item.preciob || item.precio); // Usa parseFloat para asegurar que sea un número
                return acc + (price * item.quantity);
            }, 0);
            totalElement.textContent = total.toFixed(2); // Asegúrate de mostrar el total con dos decimales
        }

        // Función para renderizar el carrito
        function renderCart() {
            const cartContainer = document.getElementById('cart-container');
            cartContainer.innerHTML = ''; // Limpiar el contenedor

            cart.forEach(item => {
                const cartItem = document.createElement('div');
                cartItem.textContent = `${item.nombre || item.nombreb} - $${(item.preciob || item.precio).toFixed(2)} x ${item.quantity}`; // Cambiado para incluir nombre y precio de bebidas
                cartContainer.appendChild(cartItem);
            });
        }

        loadPlatos(); // Carga los platos al iniciar
        loadBebidas(); // Carga las bebidas al iniciar
    });
</script>

<form method="POST">
    <label for="hora_inicio">Hora de inicio:</label>
    <input type="time" name="hora_inicio" id="hora_inicio" required><br><br>
    
    <label for="mesa_id">Selecciona el número de sillas:</label>
    <select name="mesa_id" id="mesa_id">
        <option value="1">Mesa de 2 sillas</option>
        <option value="2">Mesa de 4 sillas</option>
        <option value="3">Mesa de 6 sillas</option>
        <option value="4">Mesa de 8 sillas</option>
    </select><br><br>
</form>

<div class="container">
    <h3>Total: <span id="total">0.00</span></h3> <!-- Se establece un total inicial de 0.00 -->
    <div id="cart-container"></div> <!-- Contenedor para el carrito -->
    <button id="confirmar-pedido" class="btn btn-success">Confirmar Pedido</button>
</div>
<br>
<br>

<footer class="footer-real">
    Delizia &copy; 2024 - Todos los derechos reservados
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


