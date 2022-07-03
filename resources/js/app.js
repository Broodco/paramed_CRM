import('./bootstrap');
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import PatientsLayout from '@/Layouts/PatientsLayout.vue';
import mitt from 'mitt';

const emitter = mitt();
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Paramed CRM';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue'))
        if (page.layout === undefined && name.startsWith('Patients')) {
            page.layout = PatientsLayout
        }
        return page;
    },
    setup({ el, app: inertiaApp, props, plugin }) {
        const app =  createApp({ render: () => h(inertiaApp, props) })
            .use(plugin)
            .use(ZiggyVue, Ziggy)
            .mixin({ methods: { route } })

        app.config.globalProperties.emitter = emitter
        app.mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
