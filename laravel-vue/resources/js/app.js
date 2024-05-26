import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import i18n from './i18n';
import store from './store/store';
import axios from 'axios';

// Set the base URL for Axios
axios.defaults.baseURL = 'http://127.0.0.1:8000';

const app = createApp(App);
app.use(router).use(i18n).use(store).mount('#app');





