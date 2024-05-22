<!-- resources/js/components/Header.vue -->
<template>
  <div>
    <div class="navigation-area primary-shadow">
      <div class="top-info-bar">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="contact-info-bar">
                <ul>
                  <li><i class="fa fa-map-marker"></i> Študentské centrum UKF, Dražovská 2, Nitra</li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 text-right mobile-left">
              <div class="contact-info-bar">
                <ul>
                  <li><i class="fa fa-phone"></i> +421 902 170 744</li>
                  <li><i class="fa fa-envelope"></i> info@nconnect.sk</li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- /.container -->
      </div><!-- /.top-info-bar -->

      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <router-link class="navbar-brand" to="/"><img src="images/logo.png" alt="Site Logo" /></router-link>
          </div>

          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li :class="{ current: isActive('/') }"><router-link to="/">Home</router-link></li>
              <li :class="{ current: isActive('/speakers') }"><router-link to="/speakers">Speakers</router-link></li>
              <li :class="{ current: isActive('/Program') }"><router-link to="/Program">Program</router-link></li>
              <li :class="{ current: isActive('/partneri') }"><router-link to="/partneri">Partneri</router-link></li>
              <li :class="{ current: isActive('/contact') }"><router-link to="/contact">Contact</router-link></li>
              <li :class="{ current: isActive('/registracia') }"><router-link to="/registracia">Registrácia</router-link></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </div><!-- /.navigation-area -->
  </div>
</template>

<script>
export default {
  name: 'Header',
  methods: {
    isActive(path) {
      return this.$route.path === path;
    }
  }
};
</script>

<style scoped>
/* Add your custom styles here */
</style>

  