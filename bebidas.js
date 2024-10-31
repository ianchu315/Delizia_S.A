const cargarBebidas = async () => {
    const cardDinamicatwo = document.getElementById('card-dinamica-two');
    const templateCardtwo = document.getElementById('template-card-two');

    // Limpiar el contenido anterior
    cardDinamicatwo.innerHTML = '';

    try {
        const response = await fetch('arestaurantbebidas.json');
        const productos = await response.json();

        // Limpiar el loader
        document.getElementById('loading').classList = 'd-none';

        // Verificar si hay productos
        if (productos.length === 0) {
            cardDinamicatwo.innerHTML = '<p>No hay productos disponibles.</p>';
            return;
        }

        productos.forEach((producto) => {
            const clone = templateCardtwo.content.cloneNode(true);
            clone.querySelector('.card-title').textContent = producto.nombre;
            clone.querySelector('.desc').textContent = producto.descripcion;
            clone.querySelector('.price').textContent = `$${producto.precio}`;
            clone.querySelector('.agregar').dataset.nombre = producto.nombre;
            clone.querySelector('.agregar').dataset.precio = producto.precio;

            // Agregar evento al botón de agregar
            clone.querySelector('.agregar').addEventListener('click', () => {
                agregarAlCarrito(producto);
            });

            cardDinamicatwo.appendChild(clone);
        });
    } catch (error) {
        console.error('Error al cargar los productos:', error);
        cardDinamicatwo.innerHTML = '<p>Error al cargar los productos. Inténtalo más tarde.</p>';
    }
};

// Función para agregar al carrito
const agregarAlCarrito = (producto) => {
    console.log(`Producto agregado al carrito: ${producto.nombre}, Precio: $${producto.precio}`);
    // Aquí puedes implementar la lógica para agregar el producto al carrito
};

// Cargar los productos al iniciar la página
window.onload = cargarProductos;
