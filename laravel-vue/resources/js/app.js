// resources/js/app.js

import { createApp } from 'vue';

import axios from 'axios';

axios.defaults.baseURL = 'http://127.0.0.1:8000';


import App from './App.vue';
import router from './router';
import i18n from './i18n';

const app = createApp(App);

createApp(App)
  .use(router)
  .use(i18n)
  .mount('#app');



