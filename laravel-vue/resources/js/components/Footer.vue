<!-- resources/js/components/Footer.vue -->
<template>
    <div>
      <div class="footer-area">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="single-footer-widget">
                <a href="index.html" class="footer-logo">
                  <img :src="logoSrc" alt="logo" />
                </a>
                <p>Spájame IT komunity</p>
                <ul class="footer-social">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
              </div>
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-6">
              <div class="single-footer-widget">
                <h4>Študentské centrum UKF Dražovská 2, Nitra</h4>
                <p>info@nconnect.sk</p>
              </div>
            </div><!-- /.col -->
            <div class="col-md-4 col-sm-12">
              <div class="single-footer-widget">
                <h4>Fakulta prírodných vied a informatiky UKF v Nitre</h4>
                <a href="#" class="more-image">Ochrana osobných údajov</a>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.footer-area -->
  
      <div class="footer-bar-area">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <span>Copyright 2015 . Designed By <a href="#">BestPixels</a></span>
            </div>
          </div>
        </div>
      </div><!-- /.footer-bar-area -->
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        logoSrc: this.assetPath('images/footer-logo.png')
      };
    },
    methods: {
      assetPath(file) {
        return `${window.location.origin}/${file}`;
      }
    }
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  