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
                <a :href="sponsor.link" target="_blank">
                  <img :src="'/storage/' + sponsor.image" :alt="'sponsor ' + (index + 1)" />
                </a>
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
import axios from 'axios';

export default {
  name: 'Partners',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      sponsors: []
    };
  },
  methods: {
    isCurrent(path) {
      return this.$route.path === path;
    },
    async fetchSponsors() {
      try {
        const response = await axios.get('/api/sponsors');
        this.sponsors = response.data;
      } catch (error) {
        console.error('Error fetching sponsors:', error);
      }
    }
  },
  created() {
    this.fetchSponsors();
  }
};
</script>

<style scoped>
/* Add your styles here */
</style>

  