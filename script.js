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

//let currentTheme = getDefaultTheme();
//setTheme(currentTheme);
//
//addButtonThemeListener();

/**
 * Listens for the click of the button and execute the theme change
**/
//function addButtonThemeListener() {
//  const buttonToggler = document.querySelector("[data-theme-toggle]");
//  buttonToggler.addEventListener("click", () => {
//	  const newTheme = getNewTheme(currentTheme);
//		setTheme(newTheme);
//		currentTheme = newTheme;
//    saveTheme(newTheme);
//  });
//}

/**
 * Get the default theme for the user
 * @return {String} theme - the theme of the user
 *
**/
//function getDefaultTheme() {
//  const systemSettingDark = window.matchMedia("(prefers-color-scheme: dark)");
//  const systemSettingTheme = systemSettingDark.matches ? "dark" : "light";
//  const savedTheme = getSavedTheme();
//  return savedTheme ? savedTheme : systemSettingTheme;
//}

/**
 * Returns the new theme
 * @param {String} theme - the current app theme, dark or light
 *
**/
//function getNewTheme(theme) {
//	return theme === "dark" ? "light" : "dark";
//}

/**
 * Sets the theme globally
 * @param {String} theme - dark or light
 *
**/
//function setTheme(theme) {
//  const html = document.querySelector("html");
//  html.setAttribute("data-theme", theme);
//}

/**
 * Returns the theme saved in memory
 * @return {String} theme - the saved theme
 *
**/
//function getSavedTheme() {
//  return localStorage.getItem("theme");
//}

/**
 * Saves theme in memory
 * @return {String} theme - the theme to save
 *
**/
//function saveTheme(theme) {
//  localStorage.setItem("theme", theme);
//}