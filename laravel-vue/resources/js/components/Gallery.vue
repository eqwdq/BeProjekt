<template>
  <div>
    <Header />
    <div class="page-heading">
      <div class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li><router-link to="/">Home</router-link></li>
                <li class="active">Gallery</li>
              </ul>
              <h2>Gallery</h2>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.header-area -->

    <div v-for="(images, category) in categorizedImages" :key="category" class="image-gallery-area mb-30">
      <div class="container">
        <div class="sub-heading">
          <div class="row">
            <div class="col-md-12">
              <h4>{{ category }}</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-4" v-for="(image, index) in images" :key="index">
            <div class="single-gallery primary-shadow">
              <img :src="`/storage/${image.image}`" :alt="'gallery ' + (index + 1)" />
              <a :href="`/storage/${image.image}`" class="gallery-over image-popup"><i class="fa fa-image"></i></a>
            </div>
          </div>
        </div>
      </div><!-- /.container -->
    </div><!-- /.image-gallery-area -->
<br><br><br><br><br><br><br><br>
    <Footer />
  </div>
</template>

<script>
import Header from './Header.vue';
import Footer from './Footer.vue';
import axios from 'axios';

export default {
  name: 'Gallery',
  components: {
    Header,
    Footer
  },
  data() {
    return {
      categorizedImages: {}
    };
  },
  methods: {
    async fetchImages() {
      try {
        const response = await axios.get('/api/gallery');
        const images = response.data;

        // Group images by category
        const categorizedImages = images.reduce((acc, image) => {
          if (!acc[image.category]) {
            acc[image.category] = [];
          }
          acc[image.category].push(image);
          return acc;
        }, {});

        this.categorizedImages = categorizedImages;
      } catch (error) {
        console.error('Error fetching gallery images:', error);
      }
    }
  },
  async mounted() {
    await this.fetchImages();
  }
};
</script>

<style scoped>
/* Add your scoped styles here */
</style>

  