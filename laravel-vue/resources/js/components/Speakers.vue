// resources/js/components/Speakers.vue
<template>
	<div>
	  <Header />
	  <div class="content-wrapper">
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
			  <!-- Loop through each speaker and display their information -->
			  <div v-for="speaker in speakers" :key="speaker.id" class="col-md-3 col-sm-6 mb30">
				<div class="single-speaker primary-shadow white-bg">
				  <div class="speaker-cover">
					<div class="speaker-cover-over">
					  <div class="speakers-thought">
						<p>{{ speaker.description }}</p>
						<button @click="viewDetails(speaker.id)" class="btn btn-primary">
						  More About Me
						</button>
					  </div>
					</div>
					<h6>{{ speaker.name }}</h6>
				  </div>
				  <img :src="'/storage/' + speaker.image" alt="Speaker Image" class="img-fluid">
				  <div v-if="speaker.instagram || speaker.youtube">
					<p v-if="speaker.instagram">
					  <a :href="speaker.instagram" target="_blank">Instagram</a>
					</p>
					<p v-if="speaker.youtube">
					  <a :href="speaker.youtube" target="_blank">YouTube</a>
					</p>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		<!-- Speaker details modal -->
		<div v-if="selectedSpeaker" class="modal fade show" style="display: block;">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title">{{ selectedSpeaker.name }}</h5>
				<button type="button" class="close" @click="selectedSpeaker = null">
				  <span>&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<img :src="'/storage/' + selectedSpeaker.image" alt="Speaker Image" class="img-fluid">
				<p>{{ selectedSpeaker.description }}</p>
				<div v-if="selectedSpeaker.instagram || selectedSpeaker.youtube">
				  <p v-if="selectedSpeaker.instagram">
					<a :href="selectedSpeaker.instagram" target="_blank">Instagram</a>
				  </p>
				  <p v-if="selectedSpeaker.youtube">
					<a :href="selectedSpeaker.youtube" target="_blank">YouTube</a>
				  </p>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" @click="selectedSpeaker = null">
				  Close
				</button>
			  </div>
			</div>
		  </div>
		</div>
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
  /* Add your scoped styles here */
  .content-wrapper {
	padding: 20px;
  }
  .speakers-area {
	padding: 20px 0;
  }
  .single-speaker {
	margin-bottom: 20px;
	padding: 10px;
  }
  .modal-dialog {
	max-width: 600px;
  }
  .modal-content {
	padding: 20px;
  }
  </style>

  
  
  
  
  
  