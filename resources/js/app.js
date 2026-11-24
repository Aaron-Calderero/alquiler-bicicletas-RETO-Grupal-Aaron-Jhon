import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import { initCatalogo } from './catalog';

document.addEventListener("DOMContentLoaded", () => {
    initCatalogo();
});
