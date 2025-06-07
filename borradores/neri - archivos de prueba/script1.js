document.getElementById("formPromo").addEventListener("submit", e => {
    e.preventDefault();
    const nombre = document.getElementById("nombrePromo").value;
    const vigencia = document.getElementById("vigenciaPromo").value;
    const condicion = document.getElementById("condicionPromo").value;
    const tipo = document.getElementById("tipoPromo").value;

    const row = `<tr>
        <td>${nombre}</td>
        <td>${vigencia}</td>
        <td>${condicion}</td>
        <td>${tipo}</td>
    </tr>`;
    document.getElementById("tablaPromos").innerHTML += row;

    e.target.reset();
});

document.getElementById("formCliente").addEventListener("submit", e => {
    e.preventDefault();
    const nombre = document.getElementById("nombreCliente").value;
    const puntos = parseInt(document.getElementById("puntosCliente").value);

    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${nombre}</td>
        <td class="puntos">${puntos}</td>
        <td><button onclick="sumarPuntos(this)">+10</button></td>
    `;
    document.getElementById("tablaClientes").appendChild(row);
    actualizarTop();
    e.target.reset();
});

function sumarPuntos(btn) {
    const celda = btn.parentElement.parentElement.querySelector(".puntos");
    celda.textContent = parseInt(celda.textContent) + 10;
    actualizarTop();
}

function actualizarTop() {
    const clientes = Array.from(document.querySelectorAll("#tablaClientes tr"));
    const ranking = clientes.map(row => {
        return {
            nombre: row.cells[0].textContent,
            puntos: parseInt(row.querySelector(".puntos").textContent)
        };
    });

    ranking.sort((a, b) => b.puntos - a.puntos);

    const topList = document.getElementById("topClientes");
    topList.innerHTML = "";

    ranking.slice(0, 3).forEach(c => {
        const li = document.createElement("li");
        li.textContent = `${c.nombre}: ${c.puntos} pts`;
        topList.appendChild(li);
    });
}