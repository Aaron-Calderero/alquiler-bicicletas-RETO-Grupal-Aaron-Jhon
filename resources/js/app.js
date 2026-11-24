import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { initCatalogo } from './catalog';
import { cambiarTema } from './theme-switcher';

document.addEventListener("DOMContentLoaded", () => {
    initCatalogo();
    cambiarTema();
});
