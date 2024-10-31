const cargarProductos = async () => {
    const cardDinamicaUno = document.getElementById('card-dinamica');
    const templateCardUno = document.getElementById('template-card');

    const cardDinamicaDos = document.getElementById('card-dinamica-dos');
    const templateCardDos = document.getElementById('template-card-dos');

    // Limpiar el contenido anterior
    cardDinamicaUno.innerHTML = '';
    cardDinamicaDos.innerHTML = '';

    try {
        const aRestaurantResponse = await fetch('aheladeria.json');
        const RestaurantProductos = await aRestaurantResponse.json();

        const aRestaurantBebidasResponse = await fetch('aheladeriabebidas.json');
        const RestaurantBebidas = await aRestaurantBebidasResponse.json();

        // Limpiar el loader
        document.getElementById('loading').classList = 'd-none';

        // Verificar si hay productos
        if (RestaurantProductos.length === 0) {
            cardDinamicaUno.innerHTML = '<p>No hay productos disponibles.</p>';
            return;
        }

        RestaurantProductos.forEach((producto) => {
            const clone = templateCardUno.content.cloneNode(true);
            clone.querySelector('.card-title').textContent = producto.nombre;
            clone.querySelector('.desc').textContent = producto.descripcion;
            clone.querySelector('.price').textContent = `$${producto.precio}`;

            cardDinamicaUno.appendChild(clone);
        });

         RestaurantBebidas.forEach((producto) => {
             const clone = templateCardDos.content.cloneNode(true);
             clone.querySelector('.card-title').textContent = producto.nombreb;
             clone.querySelector('.desc').textContent = producto.descripcionb;
             clone.querySelector('.price').textContent = `$${producto.preciob}`;
            
             cardDinamicaDos.appendChild(clone);
         });
    } catch (error) {
        console.error('Error al cargar los productos:', error);
        cardDinamica.innerHTML = '<p>Error al cargar los productos. Inténtalo más tarde.</p>';
    }
};


// Cargar los productos al iniciar la página
window.onload = cargarProductos;