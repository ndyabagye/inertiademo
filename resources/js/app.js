import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    // resolve: name => {
    //     const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    //     let page = pages[`./Pages/${name}.vue`]
    //     page.default.layout = name.startsWith('Auth/') || name.startsWith('Welcome') ? page.default.layout : AuthenticatedLayout
    //     return page
    // },
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#29d',
        showSpinner: true
    },
});
