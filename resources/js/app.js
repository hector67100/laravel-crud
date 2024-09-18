import './bootstrap';
import { createApp } from "vue";

import App from "./vue/app.vue";
import store from "./vue/store/index";
import router from "./vue/router/index";
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

createApp(App).use(store).use(router).mount("#app");