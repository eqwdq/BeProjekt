import { createRouter, createWebHistory } from 'vue-router';
import Welcome from "../components/Welcome.vue";
import Speakers from "../components/Speakers.vue";
import Program from "../components/Program.vue";
import Partners from "../components/Partners.vue";
import Contact from "../components/Contact.vue";
import Registration from "../components/Registration.vue";
import AdminRegistration from "../components/AdminRegistration.vue";
import AdminLogin from "../components/AdminLogin.vue";
import AdminAddSpeaker from "../components/AdminAddSpeaker.vue";
import AdminEditSpeaker from "../components/AdminEditSpeaker.vue";
import AdminAddProgram from '../components/AdminAddProgram.vue';
import AdminEditProgram from '../components/AdminEditProgram.vue';
import Gallery from '../components/Gallery.vue';
import AdminAddGallery from '../components/AdminAddGallery.vue';

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
            name: 'Speakers',
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
        },
        {
            path: '/admin/register',
            name: 'admin-register',
            component: AdminRegistration
        },
        {
            path: '/admin/login',
            name: 'admin-login',
            component: AdminLogin
        },
        {
            path: '/admin/addspeaker',
            name: 'admin-add-speaker',
            component: AdminAddSpeaker
        },
        {
            path: '/admin/editspeaker/:id', 
            name: 'admin-edit-speaker',
            component: AdminEditSpeaker,
            props: true 
        },
        {
            path: '/admin/programs/add',
            name: 'AdminAddProgram',
            component: AdminAddProgram
          },
          {
            path: '/admin/programs/edit/:id',
            name: 'admin-edit-program',
            component: AdminEditProgram,
            props: true
          },
          {
            path: '/gallery', 
            name: 'Gallery',
            component: Gallery
        },
        {
            path: '/admin/gallery/add', 
            name: 'AdminAddGallery',
            component: AdminAddGallery
        },
    ]
});

export default router;





