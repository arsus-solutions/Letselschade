import "./bootstrap";

const inertiaAppElement = document.getElementById("app");
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

if (inertiaAppElement) {
    const appName = import.meta.env.VITE_APP_NAME || "Letselschadeclaimen";

    createInertiaApp({
        title: (title) => `${title} - ${appName}`,
        resolve: (name) =>
            resolvePageComponent(
                `./Pages/${name}.vue`,
                import.meta.glob("./Pages/**/*.vue")
            ),
        setup({ el, App, props, plugin }) {
            return createApp({ render: () => h(App, props) })
                .use(plugin)
                .use(ZiggyVue)
                .mount(el);
        },
        progress: {
            color: "#4B5563",
        },
    });
} else {
    const menuToggle = document.getElementById("btn-menu-opener");
    const navMenu = document.querySelector("nav.main");
    menuToggle.addEventListener("click", () => {
        if (window.getComputedStyle(navMenu).display === "none") {
            navMenu.style.display = "block"; // Show the content if it's hidden
        } else {
            navMenu.style.display = "none"; // Hide the content if it's visible
        }
    });
}
