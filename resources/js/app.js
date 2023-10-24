import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'
import { createInertiaApp } from '@inertiajs/vue3'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel'

createInertiaApp({
   title: (title) => title ? `${title} - ${appName}` : `${appName}`,
   resolve: (name) => resolvePageComponent(`./pages/${name}.vue`, import.meta.glob('./pages/**/*.vue')),
   setup({ el, App, props, plugin }) {
      createApp({ render: () => h(App, props) })
         .use(plugin)
         .mount(el)
   }
})
