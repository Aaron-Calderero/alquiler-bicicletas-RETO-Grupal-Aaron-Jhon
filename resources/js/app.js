import { initCatalogo } from './catalog';
import { cambiarTema } from './theme-switcher';
import {initMenuHamburguesa} from './burger-menu';

document.addEventListener("DOMContentLoaded", () => {
    initCatalogo();
    cambiarTema();
    initMenuHamburguesa();
});
