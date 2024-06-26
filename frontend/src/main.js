/**
 * main.js
 *
 * Bootstraps Vuetify and other plugins then mounts the App`
 */

// Plugins
import { registerPlugins } from '@/plugins'

// Components
import App from './App.vue'
import BaseLayout from "@/layouts/BaseLayout.vue";

// Composables
import { createApp } from 'vue'
import { VueMaskDirective } from 'v-mask'

const app = createApp(App)



registerPlugins(app)

app.component("base-layout",BaseLayout)

app.directive('mask', VueMaskDirective)

app.mount('#app')
