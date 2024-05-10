import './bootstrap';
import '../css/app.css';
import vuetify from './plugins/vuetify.js'
import "@phosphor-icons/web/duotone";
import "@phosphor-icons/web/regular";

import { createApp, h } from 'vue';
import {createInertiaApp, Link} from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

const appName = import.meta.env.VITE_APP_NAME || 'Zig.Exchange';
import  VueSelect  from "vue-select";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(vuetify)
            .component("vv-select", VueSelect)
            .component("InertiaLink", Link)
            .mount(el);
    },
    progress: {
        color: '#ffffff',
        showSpinner:true
    },
});
