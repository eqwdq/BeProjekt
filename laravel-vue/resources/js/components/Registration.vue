//resources/js/components/Registration.vue

<template>
  <div>
      <Header />
  
  <Footer />
</div>
</template>

<script>
import Header from './Header.vue';
import Footer from './Footer.vue';

export default {
  components: {
    Header,
    Footer
  },
  data() {
    return {
      name: '',
      email: '',
      password: '',
      passwordConfirm: ''
    };
  },
  methods: {
    register() {
      // Your registration logic goes here
    }
  }
};
</script>

<style scoped>
/* Add your custom styles here */
</style>

  
  