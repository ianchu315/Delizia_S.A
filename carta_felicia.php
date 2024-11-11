<?php
session_start(); 
if (!isset($_SESSION['nombre']) || !isset($_SESSION['apellido'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heladeria Felicia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="cartas.css">
</head>
<body>

<header class="nav">
    <a href="inicio.php" class="titulo">Felicia</a>
    <div class="cerrar_se">
        <a class="a" href="login.php"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
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

<center>
<div class="container my-5">
    <h2>Selecciona la hora de tu reserva:</h2>
    <input type="time" id="horaReserva" required min="07:00" max="23:30">
</div>
</center>

<div class="justificado">
    <h2>Comidas</h2>
    <div style="margin-left: 3%" class="conteiner">
        <div class="row" id="card-dinamica"></div>
        <template class="template-card" id="template-card">
            <article class="col-md-6 col-lg-3 mb-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title text-primary lead"></h5>
                        <p class="desc"></p>
                        <p class="lead price text-secondary"></p>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-danger minus">-</button>
                            <span class="quantity mx-2" style="cursor: pointer;">0</span>
                            <button class="btn btn-success plus">+</button>
                        </div>
                        <button class="btn btn-primary add-to-cart mt-2">Añadir a la orden</button>
                    </div> 
                </div>
            </article>
        </template>
    </div>
</div>

<div class="justificado">
    <h2>Bebidas</h2>
    <div style="margin-left: 3%" class="conteiner">
        <div class="row" id="card-dinamica-dos"></div>
        <template class="template-card" id="template-card-dos">
            <article class="col-md-6 col-lg-3 mb-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 class="card-title text-primary lead"></h5>
                        <p class="desc"></p>
                        <p class="lead price text-secondary"></p>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-danger minus">-</button>
                            <span class="quantity mx-2" style="cursor: pointer;">0</span>
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
    let totalAmount = 0;

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

                template.querySelector('.minus').addEventListener('click', () => {
                    if (quantity > 0) {
                        quantity--;
                        quantitySpan.textContent = quantity;
                    }
                    if (quantity === 0) {
                        cancelCartItem(item);
                    }
                });

                template.querySelector('.add-to-cart').addEventListener('click', () => {
                    addToCart(item, quantity, quantitySpan);
                });
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

                template.querySelector('.minus').addEventListener('click', () => {
                    if (quantity > 0) {
                        quantity--;
                        quantitySpan.textContent = quantity;
                    }
                    if (quantity === 0) {
                        cancelCartItem(item);
                    }
                });

                template.querySelector('.add-to-cart').addEventListener('click', () => {
                    if (quantity > 0) {
                        addToCart(item, quantity, quantitySpan);
                    } else {
                        alert("Debes seleccionar una cantidad antes de agregar al carrito.");
                    }
                });

                cardDinamicaDos.appendChild(template);
            });
        }

        function addToCart(item, quantity, quantitySpan) {
            if (quantity > 0) {
                const cartItemIndex = cart.findIndex(cartItem => 
                    (cartItem.nombre === item.nombre || cartItem.nombreb === item.nombreb)
                );

                const itemPrice = item.precio !== undefined ? item.precio : item.preciob;

                if (cartItemIndex > -1) {
                    cart[cartItemIndex].cantidad += quantity;
                    totalAmount += itemPrice * quantity;
                } else {
                    cart.push({ ...item, cantidad: quantity });
                    totalAmount += itemPrice * quantity;
                }

                updateTotal();
                renderCart();
                quantitySpan.textContent = 0;
            } else {
                alert('Selecciona una cantidad válida');
            }
        }

        function cancelCartItem(item) {
            const cartItemIndex = cart.findIndex(cartItem => (cartItem.nombre === item.nombre || cartItem.nombreb === item.nombreb));
    
            if (cartItemIndex > -1) {
                const itemPrice = item.precio !== undefined ? item.precio : item.preciob;
                totalAmount -= itemPrice * cart[cartItemIndex].cantidad;
                cart.splice(cartItemIndex, 1);
                updateTotal();
                renderCart();
            }
        }

        function updateTotal() {
            const totalElement = document.getElementById('total');
            if (isNaN(totalAmount) || totalAmount === null) {
                totalAmount = 0;
            }
            totalElement.textContent = totalAmount.toFixed(2);
        }

        function renderCart() {
            const cartContainer = document.getElementById('cart-container');
            cartContainer.innerHTML = '';

            cart.forEach(item => {
                const itemPrice = item.precio !== undefined ? item.precio : item.preciob;
                const cartItem = document.createElement('div');
                cartItem.innerHTML = `
                    <p>${item.nombre || item.nombreb} - Cantidad: ${item.cantidad} - $${(itemPrice * item.cantidad).toFixed(2)}
                    <button class="btn btn-danger btn-sm remove" data-name="${item.nombre || item.nombreb}">Eliminar</button>
                `;
                cartContainer.appendChild(cartItem);
                cartContainer.querySelectorAll('.remove').forEach(button => {
                    button.addEventListener('click', () => {
                        const itemName = button.getAttribute('data-name');
                        const item = cart.find(cartItem => (cartItem.nombre === itemName || cartItem.nombreb === itemName));
                        cancelCartItem(item);
                    });
                });
            });
        }

        // Cargar platos y bebidas
        loadPlatos();
        loadBebidas();
    });

    function saveOrder() {
        const orderData = {
            user: {
                nombre: '<?php echo $_SESSION['nombre']; ?>',
                apellido: '<?php echo $_SESSION['apellido']; ?>',
            },
            items: cart,
            total: totalAmount
        };

        fetch('save_orderhelado.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(orderData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Pedido guardado con éxito.');
                cart.length = 0;
                totalAmount = 0; 
                updateTotal();
                renderCart();
            } else {
                alert('Error al guardar el pedido.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

<br>
<br>

<<<<<<< Updated upstream
<div class="container">
=======
<div class="g-pedido">
>>>>>>> Stashed changes
    <div id="cart-container"></div>
    <div class="contenido">
        <h3>Total: $<span id="total">0.00</span></h3>
        <button class="boton-v" onclick="saveOrder()">Guardar Pedido</button>
    </div>
</div>

<br>
<br>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
