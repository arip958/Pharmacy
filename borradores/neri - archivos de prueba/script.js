function sumarPuntos(boton, cantidad) {
    let fila = boton.parentElement.parentElement;
    let celdaPuntos = fila.querySelector(".puntos");
    let celdaBeneficio = fila.querySelector(".beneficio");

    // Obtener y actualizar puntos
    let puntosActuales = parseInt(celdaPuntos.textContent);
    let nuevosPuntos = puntosActuales + cantidad;
    celdaPuntos.textContent = nuevosPuntos;

    // Actualizar el atributo de la fila
    fila.setAttribute("data-puntos", nuevosPuntos);

    // Revisar beneficios según puntos
    if (nuevosPuntos >= 100) {
        celdaBeneficio.textContent = "Descuento 10%";
    } else if (nuevosPuntos >= 50) {
        celdaBeneficio.textContent = "Regalo Sorpresa";
    } else {
        celdaBeneficio.textContent = "-";
    }

    // Actualizar la lista de clientes destacados
    actualizarClientesDestacados();
}

function filtrarClientes() {
    let filtro = document.getElementById("filtroPuntos").value;
    let filas = document.querySelectorAll("#tablaClientes tr");

    filas.forEach(fila => {
        let puntos = parseInt(fila.getAttribute("data-puntos"));
        if (isNaN(filtro) || puntos >= filtro) {
            fila.style.display = "";
        } else {
            fila.style.display = "none";
        }
    });
}

function filtrarClientesPorMes() {
    let mesSeleccionado = document.getElementById("filtroMes").value;
    let filas = document.querySelectorAll("#tablaClientes tr");

    filas.forEach(fila => {
        let mesCliente = fila.getAttribute("data-mes");
        if (mesSeleccionado === "todos" || mesCliente === mesSeleccionado) {
            fila.style.display = "";
        } else {
            fila.style.display = "none";
        }
    });
}

function actualizarClientesDestacados() {
    let filas = document.querySelectorAll("#tablaClientes tr");
    let clientes = [];

    filas.forEach(fila => {
        let nombre = fila.cells[0].textContent;
        let puntos = parseInt(fila.querySelector(".puntos").textContent);
        clientes.push({ nombre, puntos });
    });

    // Ordenar por puntos en orden descendente
    clientes.sort((a, b) => b.puntos - a.puntos);

    // Tomar los 3 mejores clientes
    let destacados = clientes.slice(0, 3);

    // Insertar en la tabla de clientes destacados
    let tablaDestacados = document.getElementById("clientesDestacados");
    tablaDestacados.innerHTML = ""; // Limpiar antes de actualizar

    destacados.forEach(cliente => {
        let fila = document.createElement("tr");
        fila.innerHTML = `<td>${cliente.nombre}</td><td>${cliente.puntos}</td>`;
        tablaDestacados.appendChild(fila);
    });
}

// Inicializar la tabla de clientes destacados al cargar la página
document.addEventListener("DOMContentLoaded", actualizarClientesDestacados);
