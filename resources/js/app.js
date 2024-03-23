import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import MainLayout from "./Layouts/MainLayout.vue";
import { ZiggyVue } from "ziggy-js";

createInertiaApp({
    resolve: async (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = await pages[`./Pages/${name}.vue`];
        // load Layout to every page
        page.default.layout = page.default.layout || MainLayout;
        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue) //Ziggy provides a JavaScript route() function that works like Laravel's
            .mount(el);
    },
});

/**
 *
 * When using Inertia, all of your application's routes are defined server-side.
 * This means that you don't need Vue Router or React Router.
 * Instead, you can simply define Laravel routes and return Inertia responses from those routes.
 * Classic server-side routing and controllers.
 */
