<template>
    <div>
      <Header />
  
      <div class="page-heading">
        <div class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <ul class="breadcrumb">
                  <li :class="{ current: isCurrent('/') }">
                    <router-link to="/">DOMOV</router-link>
                  </li>
                  <li class="active">PARTNERI</li>
                </ul>
                <h2>PARTNERI</h2>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.header-area -->
  
      <div class="sponsors-area gray-bg page-section">
        <div class="container">
          <div role="tabpanel" class="tab-pane" id="GoldSponsors">
            <div class="row">
              <div class="col-md-3 col-sm-6 mb30" v-for="(sponsor, index) in sponsors" :key="index">
                <div class="single-sponsor primary-shadow white-bg">
                  <img :src="sponsor.image" :alt="sponsor.alt" />
                </div>
              </div>
            </div>
          </div><!-- /.tabpanel -->
        </div><!-- /.container -->
      </div><!-- /.sponsors-area -->
  
      <Footer />
    </div>
  </template>
  
  <script>
  import Header from './Header.vue';
  import Footer from './Footer.vue';
  
  export default {
    name: 'Partners',
    components: {
      Header,
      Footer
    },
    data() {
      return {
        sponsors: [
          { image: 'images/sponsor/4.png', alt: 'sponsor 4' },
          { image: 'images/sponsor/3.png', alt: 'sponsor 3' },
          { image: 'images/sponsor/2.png', alt: 'sponsor 2' },
          { image: 'images/sponsor/1.png', alt: 'sponsor 1' }
        ]
      };
    },
    methods: {
      isCurrent(path) {
        return this.$route.path === path;
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  