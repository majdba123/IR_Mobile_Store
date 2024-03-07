import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import { getStripe } from "./plugins/stripe";

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

createApp(App).use(store).use(router).mount("#app");

const app = createApp(App);

app.config.globalProperties.$stripe = getStripe;
