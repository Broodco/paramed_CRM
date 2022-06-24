require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import PatientsLayout from '@/Layouts/PatientsLayout';
import mitt from 'mitt';

const emitter = mitt();
const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Paramed CRM';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => {
        const page = require(`./Pages/${name}.vue`)
        if (page.layout === undefined && name.startsWith('Patients')) {
            page.layout = PatientsLayout
        }
        return page;
    },
    setup({ el, app: inertiaApp, props, plugin }) {
        const app =  createApp({ render: () => h(inertiaApp, props) })
            .use(plugin)
            .mixin({ methods: { route } })

        app.config.globalProperties.emitter = emitter
        app.mount(el);
    },
});

InertiaProgress.init({ color: '#4B5563' });
