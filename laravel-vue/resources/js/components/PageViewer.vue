<template>
    <div>
      <Header />
      <div class="container">
        <h1>{{ page.title }}</h1>
        <div v-html="page.content"></div>
      </div>
      <Footer />
    </div>
  </template>
  
  <script>
  import Header from './Header.vue';
  import Footer from './Footer.vue';
  import axios from 'axios';
  
  export default {
    components: {
      Header,
      Footer
    },
    data() {
      return {
        page: {
          title: '',
          content: ''
        }
      };
    },
    methods: {
      async fetchPage() {
        try {
          const response = await axios.get(`/api/pages/${this.$route.params.id}`);
          this.page = response.data;
        } catch (error) {
          console.error('Error fetching page data:', error);
        }
      }
    },
    created() {
      this.fetchPage();
    }
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  