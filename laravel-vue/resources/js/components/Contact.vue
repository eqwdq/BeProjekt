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
                  <li class="active">Contact</li>
                </ul>
                <h2>Contact Us</h2>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.header-area -->
  
      <div class="contact-area gray-bg">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="location-card mb30 primary-shadow">
                <img src="images/contact/location.jpg" alt="location" />
                <div class="overlay"></div>
                <div class="location-info">
                  <h6>Hall Of Fame</h6>
                  <h4>49 West 32nd Street, New York</h4>
                </div>
                <span class="map-trigger" @click="toggleMap">
                  <i class="fa fa-map-marker"></i>
                </span>
                <div class="google-map-area" v-show="showMap">
                  <div id="map" class="map"></div>
                  <span class="map-close" @click="toggleMap"><i class="fa fa-close"></i></span>
                </div>
              </div>
            </div><!-- /.col -->
            <div class="col-md-4">
              <div class="contact-info primary-shadow mb30 white-bg">
                <h4>Contact Info</h4>
                <div class="row">
                  <div class="col-md-12 col-sm-6" v-for="contact in contacts" :key="contact.email">
                    <div class="single-contact-info">
                      <div class="row">
                        <div class="col-xs-5">
                          <img :src="contact.image" alt="contact" />
                        </div>
                        <div class="col-xs-7">
                          <h6>{{ contact.name }}</h6>
                          <span class="p-like">{{ contact.role }}</span>
                          <ul>
                            <li>{{ contact.phone }}</li>
                            <li>{{ contact.email }}</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.contact-info -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.contact-area -->
  
      <Footer />
    </div>
  </template>
  
  <script>
  import Header from './Header.vue';
  import Footer from './Footer.vue';
  
  export default {
    name: 'Contact',
    components: {
      Header,
      Footer
    },
    data() {
      return {
        showMap: false,
        contacts: [
          {
            name: 'Ruby Martin',
            role: 'Organizer',
            phone: '+02 596 355 32',
            email: 'ruby@evemate.com',
            image: 'images/contact/cp1.jpg'
          },
          {
            name: 'Ella Robinson',
            role: 'Planner',
            phone: '+02 596 355 32',
            email: 'ella@evemate.com',
            image: 'images/contact/cp2.jpg'
          }
        ]
      };
    },
    methods: {
      toggleMap() {
        this.showMap = !this.showMap;
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add your styles here */
  </style>
  