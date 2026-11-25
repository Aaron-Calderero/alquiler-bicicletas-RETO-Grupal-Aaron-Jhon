export function initMenuHamburguesa() {

    const burger = document.getElementById("burger-button");
    const menu = document.getElementById("navbar-menu");

    if(!burger || !menu) return;

    const userMenu = document.getElementById("user-menu");
    const userToggle = document.getElementById("user-menu-toggle");
    const userPanel = document.getElementById("user-menu-panel");

    function abrirCerrarUsuario(abierto) {
        if (!userToggle || !userPanel) return;
        userPanel.classList.toggle("is-open", abierto);
        userToggle.setAttribute("aria-expanded", String(abierto));
    }

    function abrirCerrar(abierto) {
        menu.classList.toggle("is-open", abierto);
        burger.setAttribute("aria-expanded", String(abierto));
        burger.setAttribute("aria-label", abierto ? "Cerrar menú" : "Abrir menú");
    }

    burger.addEventListener("click", () => {
        abrirCerrarUsuario(false);
        abrirCerrar(!menu.classList.contains("is-open"));
    });

    if (userToggle && userPanel) {
        userToggle.addEventListener("click", () => {
            const abrir = !userPanel.classList.contains("is-open");
            if (abrir) abrirCerrar(false);
            abrirCerrarUsuario(abrir);
        });

        document.addEventListener("click", (e) => {
            if (userMenu && !userMenu.contains(e.target) && !burger.contains(e.target)) {
                abrirCerrarUsuario(false);
            }
        });
    }

    document.addEventListener("keydown", (e) => {
        if(e.key === "Escape") {
            abrirCerrar(false);
            abrirCerrarUsuario(false);
        }
    });

}