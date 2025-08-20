import './bootstrap';
import { createApp } from 'vue';
import App from './godmode/App.vue';
import router from './godmode/router';

createApp(App).use(router).mount('#app');
