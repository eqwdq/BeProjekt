<template>
  <div>
    <AdminHeader />
    <div class="container">
      <br><br><br><br>
      <h3>Edit Speaker</h3><br><br><br><br>
      <form @submit.prevent="onSubmit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="speakerName">Name:</label>
          <input type="text" class="form-control" id="speakerName" v-model="editedSpeaker.name">
          <span v-if="errors.name" class="text-danger">{{ errors.name[0] }}</span>
        </div>
        <div class="form-group">
          <label for="speakerShortDescription">Short Description:</label>
          <textarea class="form-control" id="speakerShortDescription" v-model="editedSpeaker.short_description"></textarea>
          <span v-if="errors.short_description" class="text-danger">{{ errors.short_description[0] }}</span>
        </div>
        <div class="form-group">
          <label for="speakerLongDescription">Long Description:</label>
          <textarea class="form-control" id="speakerLongDescription" v-model="editedSpeaker.long_description"></textarea>
          <span v-if="errors.long_description" class="text-danger">{{ errors.long_description[0] }}</span>
        </div>
        <div class="form-group">
          <label for="speakerImage">Image:</label>
          <input type="file" class="form-control" id="speakerImage" @change="onFileChange">
          <span v-if="errors.image" class="text-danger">{{ errors.image[0] }}</span>
        </div>
        <div class="form-group">
          <label for="speakerInstagram">Instagram:</label>
          <input type="url" class="form-control" id="speakerInstagram" v-model="editedSpeaker.instagram">
          <span v-if="errors.instagram" class="text-danger">{{ errors.instagram[0] }}</span>
        </div>
        <div class="form-group">
          <label for="speakerYouTube">YouTube:</label>
          <input type="url" class="form-control" id="speakerYouTube" v-model="editedSpeaker.youtube">
          <span v-if="errors.youtube" class="text-danger">{{ errors.youtube[0] }}</span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</template>

<script>
import AdminHeader from './AdminHeader.vue';
import axios from 'axios';

export default {
  components: {
    AdminHeader
  },
  data() {
    return {
      editedSpeaker: {
        id: null,
        name: '',
        short_description: '',
        long_description: '',
        image: null,
        instagram: '',
        youtube: ''
      },
      errors: {}
    };
  },
  methods: {
    onFileChange(e) {
      this.editedSpeaker.image = e.target.files[0];
    },
    async onSubmit() {
      try {
        const formData = new FormData();
        if (this.editedSpeaker.name) formData.append('name', this.editedSpeaker.name);
        if (this.editedSpeaker.short_description) formData.append('short_description', this.editedSpeaker.short_description);
        if (this.editedSpeaker.long_description) formData.append('long_description', this.editedSpeaker.long_description);
        if (this.editedSpeaker.image) formData.append('image', this.editedSpeaker.image);
        if (this.editedSpeaker.instagram) formData.append('instagram', this.editedSpeaker.instagram);
        if (this.editedSpeaker.youtube) formData.append('youtube', this.editedSpeaker.youtube);

        const response = await axios.post(`/api/admin/speakers/${this.editedSpeaker.id}`, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });

        if (response.status === 200) {
          alert("Speaker updated successfully");
          this.$router.push({ name: 'AdminAddSpeaker' });
        }
      } catch (error) {
        if (error.response && error.response.status === 422) {
          this.errors = error.response.data.errors;
        } else {
          console.error('Error updating speaker:', error);
        }
      }
    },
    async fetchSpeakerData() {
      try {
        const response = await axios.get(`/api/admin/speakers/${this.$route.params.id}`);
        this.editedSpeaker = response.data;
        console.log('Fetched speaker data:', this.editedSpeaker); // Log fetched data for debugging
      } catch (error) {
        console.error('Error fetching speaker data:', error);
      }
    }
  },
  async mounted() {
    await this.fetchSpeakerData();
  }
};
</script>

<style scoped>
/* Add your custom styles here */
.text-danger {
  color: red;
}
</style>








  
  