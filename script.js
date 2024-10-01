
// funcion de autosuma

// document.addEventListener("DOMContentLoaded", function() {
//     // Seleccionar todos los checkboxes
//     const checkboxes = document.querySelectorAll('#menu-form input[class="checkbox"]');
//     const totalElement = document.getElementById('total');

//     // Función para calcular el total
//     function calcularTotal() {
//         let total = 0;

//         // Recorrer todos los checkboxes y sumar los valores seleccionados
//         checkboxes.forEach(function(checkbox) {
//             if (checkbox.checked) {
//                 total += parseFloat(checkbox.value);
//             }
//         });

//         // Formatear el total con comas cada tres dígitos
//         totalElement.textContent = total.toLocaleString('en-US', { minimumFractionDigits: 0, maximumFractionDigits: 0 });

//         // Mensaje de depuración
//         console.log("Total actualizado:", total);
//         document.getElementById('carracatoa').value = total;
//     }

//     // Añadir un evento de cambio a cada checkbox para recalcular el total
//     checkboxes.forEach(function(checkbox) {
//         checkbox.addEventListener('change', calcularTotal);
//     });    
// });

// function checks(id){
//     if(document.getElementById(id).checked == false){
//         document.getElementById(id).checked = true;
//     }else{
//         document.getElementById(id).checked = false;
//     }
    
// }

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


const carrito = document.querySelector("#carrito");
const template = document.querySelector("#template");
const footer = document.querySelector("#footer");
const templateFooter = document.querySelector("#templateFooter");
const fragment = document.createDocumentFragment();
let carritoArray = [];

// Delegación de eventos:
document.addEventListener("click", (e) => {
    // console.log(e);
    // console.log(e.target.dataset.fruta);
    // console.log(e.target.matches(".card button"));
    if (e.target.matches(".card button")) {
        agregarCarrito(e);
    }

    // console.log(e.target.matches(".list-group-item .btn-success"));
    if (e.target.matches(".list-group-item .btn-success")) {
        btnAumentar(e);
    }

    // console.log(e.target.matches(".list-group-item .btn-danger"));
    if (e.target.matches(".list-group-item .btn-danger")) {
        btnDisminuir(e);
    }
});

const agregarCarrito = (e) => {
    // console.log(e.target.dataset);
    const producto = {
        titulo: e.target.dataset.comida,
        id: e.target.dataset.comida,
        cantidad: 1,
        precio: parseInt(e.target.dataset.precio),
    };

    // buscamos el indice
    const index = carritoArray.findIndex((item) => item.id === producto.id);

    // si no existe empujamos el nuevo elemento
    if (index === -1) {
        carritoArray.push(producto);
    } else {
        // en caso contrario aumentamos su cantidad
        carritoArray[index].cantidad++;
    }

    // console.log(carritoArray);
    pintarCarrito();
};

const pintarCarrito = () => {
    carrito.textContent = "";

    // recorremos el carrito y pintamos elementos:
    carritoArray.forEach((item) => {
        const clone = template.content.cloneNode(true);
        clone.querySelector(".text-white .lead").textContent = item.titulo;
        clone.querySelector(".rounded-pill").textContent = item.cantidad;
        clone.querySelector("div .lead span").textContent =
            item.precio * item.cantidad;
        clone.querySelector(".btn-success").dataset.id = item.id;
        clone.querySelector(".btn-danger").dataset.id = item.id;
        fragment.appendChild(clone);
    });
    carrito.appendChild(fragment);

    pintarFooter();
};

const pintarFooter = () => {
    footer.textContent = "";

    const total = carritoArray.reduce(
        (acc, current) => acc + current.precio * current.cantidad,
        0
    );

    // console.log(total);

    const clone = templateFooter.content.cloneNode(true);
    clone.querySelector("p span").textContent = total;

    // fragment.appendChild(clone);
    footer.appendChild(clone);
};

const btnAumentar = (e) => {
    // console.log(e.target.dataset.id);
    carritoArray = carritoArray.map((item) => {
        if (item.id === e.target.dataset.id) {
            item.cantidad++;
        }
        return item;
    });
    pintarCarrito();
};

const btnDisminuir = (e) => {
    // console.log(e.target.dataset.id);
    carritoArray = carritoArray.filter((item) => {
        // console.log(item);
        if (item.id === e.target.dataset.id) {
            if (item.cantidad > 0) {
                item.cantidad--;
                // console.log(item);
                if (item.cantidad === 0) return;
                return item;
            }
        } else {
            return item;
        }
    });
    pintarCarrito();
};
