import { createI18n } from 'vue-i18n';

const messages = {
  en: {
    adminRegister: 'Admin Register',
    name: 'Name',
    email: 'E-Mail Address',
    password: 'Password',
    confirmPassword: 'Confirm Password',
    register: 'Register'
  },
  // Add other languages here
};

const i18n = createI18n({
  locale: 'en',
  messages,
});

export default i18n;
