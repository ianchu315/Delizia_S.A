<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comedor Bartolomé</title>
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
    const cart = []; 

    document.addEventListener('DOMContentLoaded', () => {
        const cardDinamica = document.getElementById('card-dinamica');
        const cardDinamicaDos = document.getElementById('card-dinamica-dos');
        const totalElement = document.getElementById('total');
        
        async function loadPlatos() {
            const response = await fetch('aheladeria.json');
            const apiData = await response.json();

            apiData.forEach(item => {
                const template = document.getElementById('template-card').content.cloneNode(true);
                template.querySelector('.card-title').textContent = item.nombre;
                template.querySelector('.desc').textContent = item.descripcion;
                template.querySelector('.price').textContent = `$${item.precio}`;
                
                let quantitySpan = template.querySelector('.quantity');
                let quantity = 0;
                
                template.querySelector('.plus').addEventListener('click', () => {
                    quantity++;
                    quantitySpan.textContent = quantity;
                });

                template.querySelector('.add-to-cart').addEventListener('click', () => addToCart(item, quantity, quantitySpan));
                cardDinamica.appendChild(template);
            });
        }

        async function loadBebidas() {
            const response = await fetch('aheladeriabebidas.json');
            const apiData = await response.json();

            apiData.forEach(item => {
                const template = document.getElementById('template-card-dos').content.cloneNode(true);
                template.querySelector('.card-title').textContent = item.nombreb;
                template.querySelector('.desc').textContent = item.descripcionb;
                template.querySelector('.price').textContent = `$${item.preciob}`;
                
                let quantitySpan = template.querySelector('.quantity');
                let quantity = 0;

                template.querySelector('.plus').addEventListener('click', () => {
                    quantity++;
                    quantitySpan.textContent = quantity;
                });

                template.querySelector('.add-to-cart').addEventListener('click', () => addToCart(item, quantity, quantitySpan));
                cardDinamicaDos.appendChild(template);
            });
        }

        function addToCart(item, quantity, quantitySpan) {
            if (quantity > 0) {
                // Aquí siempre añadimos un nuevo objeto al carrito
                const cartItem = { ...item, quantity: quantity }; // Crea un nuevo objeto para el carrito

                // Agrega el nuevo artículo al carrito
                cart.push(cartItem);

                updateTotal();
                renderCart();
                
                // Restablecer la cantidad a 0 después de añadir al carrito
                quantitySpan.textContent = 0; 
            }
        }

        function updateTotal() {
            const total = cart.reduce((acc, item) => {
                const price = parseFloat(item.preciob || item.precio);
                return acc + (price * item.quantity);
            }, 0);
            totalElement.textContent = total.toFixed(2);
        }

        function renderCart() {
            const cartContainer = document.getElementById('cart-container');
            cartContainer.innerHTML = '';

            cart.forEach((item, index) => {
                const cartItem = document.createElement('div');
                cartItem.classList.add('d-flex', 'justify-content-between', 'align-items-center', 'mb-2');
                cartItem.innerHTML = `
                    <span>${item.nombre || item.nombreb} - $${(item.preciob || item.precio)} x ${item.quantity}</span>
                    <div>
                        <button class="btn btn-secondary btn-sm mr-2" onclick="restar(${index})">Restar</button>
                        <button class="btn btn-danger btn-sm" onclick="cancelar(${index})">Cancelar</button>
                    </div>
                `;
                cartContainer.appendChild(cartItem);
            });
        }

        window.restar = function(index) {
            const cartItem = cart[index];
            if (cartItem.quantity > 1) {
                cartItem.quantity -= 1;
                updateTotal();
                renderCart();
            } else {
                cancelar(index);
            }
        }

        window.cancelar = function(index) {
            cart.splice(index, 1);
            updateTotal();
            renderCart();
        }

        loadPlatos();
        loadBebidas();
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
