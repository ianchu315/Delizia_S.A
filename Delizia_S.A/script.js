const carrito = document.querySelector("#carrito");
const template = document.querySelector("#template");
const footer = document.querySelector("#footer");
const templateFooter = document.querySelector("#templateFooter");
const fragment = document.createDocumentFragment();
let carritoArray = [];

// Delegación de eventos:
document.addEventListener("click", (e) => {
    if (e.target.matches(".list button")) {
        agregarCarrito(e);
    }

    if (e.target.matches(".list-group-item .btn-success")) {
        btnAumentar(e);
    }

    if (e.target.matches(".list-group-item .btn-danger")) {
        btnDisminuir(e);
    }

    if (e.target.matches("#boton-finalizar")) {
        guardarCarrito();
    }
});

const agregarCarrito = (e) => {
    const producto = {
        titulo: e.target.dataset.comida,
        id: e.target.dataset.comida,
        cantidad: 1,
        precio: parseFloat(e.target.dataset.precio), // Asegúrate de convertirlo a número
    };

    // Solo agregar el producto si tiene un título y precio válidos
    if (producto.titulo && !isNaN(producto.precio)) {
        const index = carritoArray.findIndex((item) => item.id === producto.id);

        if (index === -1) {
            carritoArray.push(producto);
        } else {
            carritoArray[index].cantidad++;
        }

        pintarCarrito();
        guardarCarrito();
    }
};



const pintarCarrito = () => {
    carrito.textContent = "";

    // Recorremos el carrito y pintamos elementos:
    carritoArray.forEach((item) => {
        // Verifica que el producto tenga un título y precio válidos
        if (item.titulo && item.precio) {
            const clone = template.content.cloneNode(true);
            clone.querySelector(".text-white .lead").textContent = item.titulo;
            clone.querySelector(".rounded-pill").textContent = item.cantidad;
            clone.querySelector("div .lead span").textContent =
                item.precio * item.cantidad;
            clone.querySelector(".btn-success").dataset.id = item.id;
            clone.querySelector(".btn-danger").dataset.id = item.id;
            fragment.appendChild(clone);
        }
    });

    carrito.appendChild(fragment);
    pintarFooter();
};

const pintarFooter = () => {
    footer.textContent = "";

    const total = carritoArray.reduce((acc, current) => {
        const precio = parseFloat(current.precio) || 0; // Asegúrate de que sea un número
        const cantidad = parseInt(current.cantidad) || 0; // Asegúrate de que sea un número
        return acc + (precio * cantidad);
    }, 0);

    const clone = templateFooter.content.cloneNode(true);
    clone.querySelector("p span").textContent = total;

    footer.appendChild(clone);
};



const btnAumentar = (e) => {
    carritoArray = carritoArray.map((item) => {
        if (item.id === e.target.dataset.id) {
            item.cantidad++;
        }
        return item;
    });
    pintarCarrito();
};

const btnDisminuir = (e) => {
    carritoArray = carritoArray.filter((item) => {
        if (item.id === e.target.dataset.id) {
            if (item.cantidad > 0) {
                item.cantidad--;
                if (item.cantidad === 0) return;
                return item;
            }
        } else {
            return item;
        }
    });
    pintarCarrito();
};

const guardarCarrito = () => {
    fetch('guardar_carrito.php', {
        method: 'POST',
        body: JSON.stringify(carritoArray),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (!data.success) {
            console.error(data.message);
        }
    })
    .catch(error => console.error('Error:', error));
};
