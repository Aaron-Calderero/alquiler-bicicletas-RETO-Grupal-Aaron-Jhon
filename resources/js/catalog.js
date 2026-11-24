function actualizarCatalogo(grid, tarjetas, modelo, orden, sinResultados) {
    const visibles = [];

    for(const tarjeta of tarjetas) {
        tarjeta.classList.add("bike-card--hidden");

        if(modelo === "all" || tarjeta.dataset.model === modelo) {
            visibles.push(tarjeta);
        }

    }

    if(orden === "asc") {
        visibles.sort((a, b) => a.dataset.price - b.dataset.price);
    } else if(orden === "desc") {
        visibles.sort((a, b) => b.dataset.price - a.dataset.price);
    }

    for(const tarjeta of visibles) {
        tarjeta.classList.remove("bike-card--hidden");
        grid.appendChild(tarjeta);
    }

    sinResultados.classList.toggle("bike-section__empty--hidden", visibles.length > 0)

}

export function initCatalogo() {

    const listaBikes = document.getElementById("bike-grid");

    if(!listaBikes) {
        return;
    }

    const selectModelo = document.getElementById("filter-model");
    const selectOrden = document.getElementById("sort-price");
    const sinResultados = document.getElementById("no-results");
    const tarjetas = [...listaBikes.querySelectorAll(".bike-card")];

    const manejarCambio = () => {
            actualizarCatalogo(listaBikes, tarjetas, selectModelo.value, selectOrden.value, sinResultados);
    };

    selectModelo.addEventListener("change", manejarCambio);
    selectOrden.addEventListener("change", manejarCambio);

}
