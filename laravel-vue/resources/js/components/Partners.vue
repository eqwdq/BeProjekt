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
    </div><!-- /.header-area --> <br><br><br><br><br>

    <div class="sponsors-area gray-bg page-section">
      <div class="container">
        <div role="tabpanel" class="tab-pane" id="GoldSponsors">
          <div class="row">
            <div class="col-md-3 col-sm-6 mb30" v-for="(sponsor, index) in sponsors" :key="index">
              <div class="single-sponsor primary-shadow white-bg">
                <a :href="sponsor.link" target="_blank">
                  <div class="img-container">
                    <img :src="'/storage/' + sponsor.image" :alt="'sponsor ' + (index + 1)" />
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div><!-- /.tabpanel -->
      </div><!-- /.container -->
    </div><!-- /.sponsors-area --><br><br><br><br><br><br>

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
.sponsors-area {
  padding: 20px 0;
}

.single-sponsor {
  margin-bottom: 20px;
  padding: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 100%;
}

.img-container {
  width: 100%;
  height: 200px; /* Set a fixed height */
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

.img-container img {
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensure the image covers the container without distortion */
}
</style>


  