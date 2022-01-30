import { createApp } from 'vue'

require('./bootstrap')
import App from './App.vue'
import axios from 'axios'
import router from './router'
import VueProgressBar from "@aacassandra/vue3-progressbar";

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


const options = {
    color: "#bffaf3",
    failedColor: "#874b4b",
    thickness: "5px",
    transition: {
        speed: "0.2s",
        opacity: "0.6s",
        termination: 300,
    },
    autoRevert: true,
    location: "top",
    inverse: false,
};


const app = createApp(App)
app.config.globalProperties.$axios = axios;
app.use(router)
app.use(VueProgressBar, options)
app.use(VueSweetalert2);
app.mount('#app')