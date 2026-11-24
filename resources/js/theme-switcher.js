function guardarPreferencia(preferencia) {
    preferencia = JSON.stringify(preferencia);
    localStorage.setItem("preferencia", preferencia);
}


export function cambiarTema() {

    const switchButton = document.getElementById("switch-button");

    const body = document.body;

    let preferencia = JSON.parse(localStorage.getItem("preferencia"));

    if(preferencia) {
        body.classList.remove("light", "dark");
        body.classList.add(preferencia);
    }

    switchButton.addEventListener("click", () => {

        if(body.classList.contains("light")) {
            body.classList.replace("light", "dark");
            guardarPreferencia("dark");
        } else {
            body.classList.replace("dark", "light");
            guardarPreferencia("light");
        }

    });

}
