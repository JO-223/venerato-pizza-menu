import "./bootstrap";
import "bootstrap";

import { createApp } from "vue";

import Welcome from "./components/Welcome.vue";
import Menu from "./components/PizzaMenu.vue";
import Order from "./components/OrderConfirmation.vue";
import Dashboard from "./components/Dashboard.vue";

const app = createApp({});

app.component("welcome", Welcome);
app.component("pizza-menu", Menu);
app.component("order", Order);
app.component("dashboard", Dashboard);

const mountedApp = app.mount("#app");
