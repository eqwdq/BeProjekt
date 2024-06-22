<template>
	<div id="app">
	  <Header />
	  <div class="header-area" id="home-header">
			<div class="header-slide header-slide-1">
				<div class="overlay">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h3>14 MAREC 2024 , <span>NITRA</span></h3>
								<h1><small>TECH KONFERENCIA PRE ŠTUDENTOV V NITRE</small>nCONNECT24</h1>
								<ul class="buttons">
                                    <li><a href="#" class="line-button">PROGRAM KONFERENCIE</a></li>
                                    <li><a href="#" class="line-button">SPEAKERS</a></li>
									<li><a href="#" class="line-button">REGISTRÁCIA</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-slide header-slide-2">
				<div class="overlay">
					<div class="container text-center">
						<div class="row">
							<div class="col-md-12">
								<h3>14 - 26 december 2016 , <span>New York</span></h3>
								<h1><small>Designer Community</small>Meetup</h1>
								<ul class="buttons">
									<li><a href="#" class="line-button">REGister Now</a></li>
									<li><a href="#" class="line-button">Learn More</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- /.header-area --><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		<div class="about-area gray-bg" id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-6 mb30">
						<div class="video-intro primary-shadow">
							<img src="images/about/video-intro.jpg" alt="video-intro" />
							<a class="video-play embedded-popup" href="https://www.youtube.com/watch?v=SZEflIVnhH8">
								<i class="fa fa-play"></i>
							</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="about-text">	
							<h4>About The Event</h4>
							<p>This event is exclusively for them who want to learn & know about material design principales introduced by Google.  Also if you are a designer, then You should know or learn about new design trend like Material Design. Beacuse this is the future of design. In this conferance we will talk about material design like & What you need not to do etc.</p>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="single-about primary-shadow white-bg">
									<h5>Who we are ?</h5>
									<p>We are the best designer comunity arond the world. We love to share our knowledge &  expriences</p>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="single-about primary-shadow white-bg">
									<h5>Our Misson</h5>
									<p>We are the best designer comunity arond the world. We love to share our knowledge &  expriences</p>
								</div>
							</div>
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.about-area -->
		
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		
		
    <div class="testimonials-area image-bg">
      <div class="overlay">
        <div class="container">
          <div class="sub-heading">
            <div class="row">
              <div class="col-md-12">
                <h4>Povedali o nás</h4>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="client-pagination clearfix" id="testimonial-pager">
                <a v-for="(review, index) in reviews" :key="index" :data-slide-index="index" href="">
                  <img :src="review.image" alt="client" />
                </a>
              </div><!-- /.client-pagination -->
            </div><!-- /.col -->
            <div class="col-md-8">
              <div id="testimonials">
                <div v-for="(review, index) in reviews" :key="index" class="single-testimonial">
                  <div class="row">
                    <div class="col-sm-7 mb30">
                      <blockquote>{{ review.description }}</blockquote>
                      <ul class="customer-rating">
                        <li v-for="n in 5" :key="n"><i class="fa fa-star"></i></li>
                      </ul>
                      <h4>{{ review.author }}</h4>
                    </div>
                    <div class="col-sm-5">
                      <div class="client-image primary-shadow">
                        <img :src="review.image" alt="client" />
                      </div>
                    </div>
                  </div>
                </div><!-- /.single-testimonial -->
              </div><!-- /#testimonials -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </div><!-- /.overlay -->
    </div><!-- /.testimonials-area -->
    
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
		reviews: []
	  };
	},
	methods: {
	  async fetchReviews() {
		try {
		  const response = await axios.get('/api/admin/reviews');
		  this.reviews = response.data;
		} catch (error) {
		  console.error('Error fetching reviews:', error);
		}
	  }
	},
	created() {
	  this.fetchReviews();
	}
  };
  </script>
  
  <style>
  /* Add your custom styles here */
  </style>
  
  