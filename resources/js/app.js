import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import feather from "feather-icons";
document.addEventListener("DOMContentLoaded", () => {
    feather.replace();
});
