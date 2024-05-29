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
                <li class="active">Speakers</li>
              </ul>
              <h2>Speakers</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="speakers-area grey-bg">
      <div class="container">
        <div class="sub-heading">
          <div class="row">
            <div class="col-md-12">
              <h4>Speakers</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div v-for="speaker in speakers" :key="speaker.id" class="col-md-3 col-sm-6 mb30">
            <div class="single-speaker primary-shadow white-bg">
              <div class="speaker-cover">
                <img :src="'/storage/' + speaker.image" alt="cover" />
                <div class="sperker-cover-over">
                  <div class="speakers-thought">
                    <p>{{ speaker.short_description }}</p>
                    <a href="" @click.prevent="viewDetails(speaker.id)" data-toggle="modal" :data-target="'#Speaker-' + speaker.id">More About Me</a>
                  </div>
                </div>
                <ul class="speaker-social">
                  <li v-if="speaker.instagram"><a :href="speaker.instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                  <li v-if="speaker.youtube"><a :href="speaker.youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <h6>{{ speaker.name }} at <a :href="speaker.company_link">{{ speaker.company }}</a></h6>
              </div>
              <div class="modal fade" :id="'Speaker-' + speaker.id" tabindex="-1">
                <div class="container">
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="speaker-details white-bg primary-shadow">
                        <div class="row no-margin">
                          <div class="col-sm-6 no-padding">
                            <div class="speaker-images-slider">
                              <img :src="'/storage/' + speaker.image" alt="speaker" />
                            </div>
                          </div>
                          <div class="col-sm-6 no-padding">
                            <div class="speaker-details-texts">
                              <div class="sdt-top">
                                <h4>{{ speaker.name }}</h4>
                                <h6>{{ speaker.position }} at {{ speaker.company }}</h6>
                                <ul>
                                  <li v-if="speaker.instagram"><a :href="speaker.instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                  <li v-if="speaker.youtube"><a :href="speaker.youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                              </div>
                              <div class="sdt-bottom">
                                <p>{{ speaker.short_description }}</p>
                                <p>{{ speaker.long_description }}</p>
                                <a href="" class="button alt small" data-dismiss="modal">Close</a>
                              </div>
                            </div>
                          </div>
                        </div><!-- /.row -->
                      </div><!-- /.speaker-details -->
                    </div>
                    <div class="col-md-2"></div>
                  </div><!-- /.row -->
                </div><!-- /.container -->
              </div><!-- /.modal -->
              <div class="speaker-name">
                <h5>{{ speaker.name }}</h5>
              </div>
            </div><!-- /.single-speaker -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.speakers-area -->
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
    Footer,
  },
  data() {
    return {
      speakers: [],
      selectedSpeaker: null, // To store the selected speaker details
    };
  },
  methods: {
    async loadSpeakers() {
      try {
        console.log('Fetching speakers data...');
        const response = await axios.get('/api/admin/speakers');
        console.log('Response data:', response.data);
        this.speakers = response.data;
      } catch (error) {
        console.error('Error fetching speakers:', error);
      }
    },
    viewDetails(speakerId) {
      // Find the selected speaker details
      this.selectedSpeaker = this.speakers.find(speaker => speaker.id === speakerId);
    },
  },
  async mounted() {
    await this.loadSpeakers();
  },
};
</script>

<style scoped>
.speaker-cover {
  height: 300px; 
}

.speaker-cover img {
  width: 100%;
  height: 100%;
  object-fit: cover; 
}
</style>





  
  
  
  
  
  