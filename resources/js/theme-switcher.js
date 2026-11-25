function guardarPreferencia(preferencia) {
    preferencia = JSON.stringify(preferencia);
    localStorage.setItem("preferencia", preferencia);
}

function esOscuro() {
    return document.body.classList.contains("dark");
}

function actualizarTexto(switchButton) {
    switchButton.textContent = esOscuro() ? "☀️ Claro" : "🌙 Oscuro";
}

export function cambiarTema() {

    const switchButton = document.getElementById("switch-button");

    const body = document.body;

    let preferencia = JSON.parse(localStorage.getItem("preferencia"));

    if(preferencia) {
        body.classList.remove("light", "dark");
        body.classList.add(preferencia);
    }

    actualizarTexto(switchButton);
    
    switchButton.addEventListener("click", (e) => {
        if(e.detail > 0) switchButton.blur();

        if(body.classList.contains("light")) {
            body.classList.replace("light", "dark");
            guardarPreferencia("dark");
        } else {
            body.classList.replace("dark", "light");
            guardarPreferencia("light");
        }

        actualizarTexto(switchButton);

    });
}
