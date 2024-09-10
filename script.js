// // Añadir animación a las imágenes del carrusel cuando se deslizan
// document.addEventListener('DOMContentLoaded', function () {
//     $('#carouselExampleControls').on('slid.bs.carousel', function () {
//         const items = document.querySelectorAll('.carousel-item');
//         items.forEach(item => item.classList.remove('slide-in'));
//         const activeItem = document.querySelector('.carousel-item.active');
//         activeItem.classList.add('slide-in');
//     });
// });

document.addEventListener("DOMContentLoaded", function() {
    // Seleccionar todos los checkboxes
    const checkboxes = document.querySelectorAll('#menu-form input[type="checkbox"]');
    const totalElement = document.getElementById('total');

    // Función para calcular el total
    function calcularTotal() {
        let total = 0;

        // Recorrer todos los checkboxes y sumar los valores seleccionados
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                total += parseFloat(checkbox.value);
            }
        });

        // Formatear el total con comas cada tres dígitos
        totalElement.textContent = total.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });

        // Mensaje de depuración
        console.log("Total actualizado:", total);
    }

    // Añadir un evento de cambio a cada checkbox para recalcular el total
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', calcularTotal);
    });
});


