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
import AdminAddSponzor from '../components/AdminAddSponzor.vue';
import AdminAddReview from '../components/AdminAddReview.vue';
import AdminEditReview from '../components/AdminEditReview.vue';
import AdminPageEditor from '../components/AdminPageEditor.vue'; 
import PageViewer from '../components/PageViewer.vue'; 
import RegisteredPeople from '../components/RegisteredPeople.vue';


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
        {
            path: '/admin/sponsors/add',
            name: 'admin-add-sponsor',
            component: AdminAddSponzor
        },
        {
            path: '/admin/review/add',
            name: 'admin-add-review',
            component: AdminAddReview
          },
          {
            path: '/admin/reviews/edit/:id',
            name: 'admin-edit-review',
            component: AdminEditReview,
            props: true
          },
          {
            path: '/admin/pages/add',
            name: 'admin-add-page',
            component: AdminPageEditor
          },
          {
            path: '/admin/pages/edit/:id',
            name: 'admin-edit-page',
            component: AdminPageEditor,
            props: true
          },
          {
            path: '/pages/:id',
            name: 'page-viewer',
            component: PageViewer,
            props: true
          },
          { path: '/admin/registered', 
            name: 'registered-people', 
            component: RegisteredPeople }
    ]
});

export default router;





