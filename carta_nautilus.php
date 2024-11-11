<?php
session_start(); 
if (!isset($_SESSION['nombre']) || !isset($_SESSION['apellido'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ess">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria Nutilus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="cartas.css">
</head>
<body>

<header class="nav">
    <a href="inicio.php" class="titulo">Nautilus</a>
    <div class="cerrar_se">
        <a class="a" href="login.html"><img src="img/boton.png" alt="boton">Cerrar sesión</a>
    </div>
    <div class="selecciones">
        <button>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <a href="inicio.php">Inicio</a>
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

<center>
<div class="container my-5">
    <h2>Selecciona la mesa y cantidad:</h2>
    <select id="mesaSelect" required>
        <option value="">Mesa y cantidad</option>
        <option value="mesa1">Mesa 1 (2 sillas)</option>
        <option value="mesa2">Mesa 2 (2 sillas)</option>
        <option value="mesa3">Mesa 3 (2 sillas)</option>
        <option value="mesa4">Mesa 4 (2 sillas)</option>
        <option value="mesa5">Mesa 5 (2 sillas)</option>
        <option value="mesa6">Mesa 6 (2 sillas)</option>
        <option value="mesa7">Mesa 7 (4 sillas)</option>
        <option value="mesa8">Mesa 8 (4 sillas)</option>
        <option value="mesa9">Mesa 9 (4 sillas)</option>
        <option value="mesa10">Mesa 10 (4 sillas)</option>
        <option value="mesa11">Mesa 11 (4 sillas)</option>
        <option value="mesa12">Mesa 12 (4 sillas)</option>
        <option value="mesa13">Mesa 13 (6 sillas)</option>
        <option value="mesa14">Mesa 14 (6 sillas)</option>
        <option value="mesa15">Mesa 15 (6 sillas)</option>
        <option value="mesa16">Mesa 16 (6 sillas)</option>
    </select>
</div>
</center>

<div class="justificado">
    <h2>Comidas</h2>
    <br>
    <br>
    <div style="margin-left: 3%" class="conteiner">
        <div class="row" id="card-dinamica"></div>
        <template class="template-card" id="template-card">
            <article class="col-md-6 col-lg-3 mb-3">
                <div class="card text-center shadow">
                    <div class="card-body">
                        <h5 style="color: var(--violeta)" class="card-title text-primary lead"></h5>
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
    <br>
    <br>
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
            const response = await fetch('acafeteria.json');
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
    const response = await fetch('acafeteriabebidas.json');
    const apiData = await response.json();

    apiData.forEach(item => {
        const template = document.getElementById('template-card-dos').content.cloneNode(true);
        template.querySelector('.card-title').textContent = item.nombreb;
        template.querySelector('.desc').textContent = item.descripcionb;
        template.querySelector('.price').textContent = `$${item.preciob}`;
        
        let quantitySpan = template.querySelector('.quantity');
        let quantity = 0;

        // Incrementar cantidad
        template.querySelector('.plus').addEventListener('click', () => {
            quantity++;
            quantitySpan.textContent = quantity;
        });

        // Decrementar cantidad
        template.querySelector('.minus').addEventListener('click', () => {
            if (quantity > 0) {
                quantity--;
                quantitySpan.textContent = quantity;
            }
            // Asegurarse de que al llegar a 0, el producto no esté en el carrito
            if (quantity === 0) {
                cancelCartItem(item); // Asegúrate de que esta función maneje correctamente la eliminación
            }
        });

        // Agregar al carrito
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

        // Determina el precio correcto según el tipo de item
        const itemPrice = item.precio !== undefined ? item.precio : item.preciob;

        if (cartItemIndex > -1) {
            // Si el elemento ya existe, actualiza la cantidad y el total
            cart[cartItemIndex].cantidad += quantity;
            totalAmount += itemPrice * quantity; // Sumar al total
        } else {
            // Si no existe, agrégalo al carrito con la cantidad
            cart.push({ ...item, cantidad: quantity });
            totalAmount += itemPrice * quantity; // Sumar al total
        }

        // Actualiza la interfaz
        updateTotal();
        renderCart();
        quantitySpan.textContent = 0; // Reiniciar cantidad en la interfaz
    } else {
        alert('Selecciona una cantidad válida');
    }
}

        function cancelCartItem(item) {
    // Busca el índice del item en el carrito
    const cartItemIndex = cart.findIndex(cartItem => (cartItem.nombre === item.nombre || cartItem.nombreb === item.nombreb));
    
    if (cartItemIndex > -1) {
        // Determina el precio correcto basado en si es un plato o bebida
        const itemPrice = item.precio !== undefined ? item.precio : item.preciob;

        // Resta del total el precio del item multiplicado por la cantidad en el carrito
        totalAmount -= itemPrice * cart[cartItemIndex].cantidad; // Resta el total del item
        cart.splice(cartItemIndex, 1); // Elimina el item del carrito
        updateTotal(); // Actualiza el total
        renderCart(); // Renderiza el carrito
    }
}

function updateTotal() {
    const totalElement = document.getElementById('total');
    // Verifica si totalAmount es un número
    if (isNaN(totalAmount) || totalAmount === null) {
        totalAmount = 0; // Establece un valor por defecto
    }

    totalElement.textContent = totalAmount.toFixed(2); // Formatea el total a 2 decimales
}


function renderCart() {
    const cartContainer = document.getElementById('cart-container');
    cartContainer.innerHTML = ''; // Limpia el contenedor del carrito

    cart.forEach(item => {
        const itemPrice = item.precio !== undefined ? item.precio : item.preciob; // Determina el precio
        const cartItem = document.createElement('div');
        cartItem.innerHTML = `
            <p>${item.nombre || item.nombreb} - Cantidad: ${item.cantidad} - $${(itemPrice * item.cantidad).toFixed(2)}
            <button class="btn btn-danger btn-sm remove" data-name="${item.nombre || item.nombreb}">Eliminar</button>
        `;
        cartContainer.appendChild(cartItem); // Agrega el item al contenedor
        // Agrega un evento de click para eliminar el item
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
        const horaReserva = document.getElementById('horaReserva').value;
        const mesaSelect = document.getElementById('mesaSelect').value;

        if (!horaReserva || !mesaSelect) {
            alert('Por favor, selecciona una hora y una mesa.');
            return;
        }

        const orderData = {
            user: {
                nombre: '<?php echo $_SESSION['nombre']; ?>',
                apellido: '<?php echo $_SESSION['apellido']; ?>',
            },
            hora: horaReserva,
            mesa: mesaSelect,
            items: cart,
            total: totalAmount
        };

        fetch('save_ordercafe.php', {
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
                document.getElementById('horaReserva').value = '';
                document.getElementById('mesaSelect').value = '';
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

<div class="g-pedido">
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