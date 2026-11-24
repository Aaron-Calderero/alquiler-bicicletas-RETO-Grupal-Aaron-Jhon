import { initCatalogo } from './catalog';
import { cambiarTema } from './theme-switcher';

document.addEventListener("DOMContentLoaded", () => {
    initCatalogo();
    cambiarTema();
});
