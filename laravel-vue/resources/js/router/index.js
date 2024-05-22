import { createRouter, createWebHistory } from 'vue-router';
import Welcome from "../components/Welcome.vue";
import Speakers from "../components/Speakers.vue";
import Program from "../components/Program.vue";
import Partners from "../components/Partners.vue";
import Contact from "../components/Contact.vue";
import Registration from "../components/Registration.vue";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: Welcome
        },
        {
            path: '/speakers',
            name: 'speakers',
            component: Speakers
        },
        {
            path: '/program',
            name: 'program',
            component: Program
        },
        {
            path: '/partneri',
            name: 'partneri',
            component: Partners
        },
        {
            path: '/contact',
            name: 'contact',
            component: Contact
        },
        {
            path: '/registracia',
            name: 'registracia',
            component: Registration
        }
    ]
});

export default router;

