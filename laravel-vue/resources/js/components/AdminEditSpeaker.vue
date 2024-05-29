<template>
  <div>
    <AdminHeader />
    <div class="container">
      <br><br><br><br>
      <h3>Edit Speaker</h3><br><br><br><br>
      <form @submit.prevent="onSubmit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="speakerName">Name:</label>
          <input type="text" class="form-control" id="speakerName" v-model="editedSpeaker.name" required>
        </div>
        <div class="form-group">
          <label for="speakerShortDescription">Short Description:</label>
          <textarea class="form-control" id="speakerShortDescription" v-model="editedSpeaker.short_description" required></textarea>
        </div>
        <div class="form-group">
          <label for="speakerLongDescription">Long Description:</label>
          <textarea class="form-control" id="speakerLongDescription" v-model="editedSpeaker.long_description" required></textarea>
        </div>
        <div class="form-group">
          <label for="speakerImage">Image:</label>
          <input type="file" class="form-control" id="speakerImage" @change="onFileChange">
        </div>
        <div class="form-group">
          <label for="speakerInstagram">Instagram:</label>
          <input type="url" class="form-control" id="speakerInstagram" v-model="editedSpeaker.instagram">
        </div>
        <div class="form-group">
          <label for="speakerYouTube">YouTube:</label>
          <input type="url" class="form-control" id="speakerYouTube" v-model="editedSpeaker.youtube">
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
      }
    };
  },
  methods: {
    onFileChange(e) {
      this.editedSpeaker.image = e.target.files[0];
    },
    async onSubmit() {
      try {
        const formData = new FormData();
        formData.append('name', this.editedSpeaker.name);
        formData.append('short_description', this.editedSpeaker.short_description);
        formData.append('long_description', this.editedSpeaker.long_description);
        if (this.editedSpeaker.image) {
          formData.append('image', this.editedSpeaker.image);
        }
        formData.append('instagram', this.editedSpeaker.instagram);
        formData.append('youtube', this.editedSpeaker.youtube);

        const response = await axios.put(`/api/admin/speakers/${this.editedSpeaker.id}`, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });

        if (response.status === 200) {
          this.$router.push({ name: 'Home' });
        }
      } catch (error) {
        console.error('Error updating speaker:', error);
      }
    },
    async fetchSpeakerData() {
      try {
        const response = await axios.get(`/api/admin/speakers/${this.$route.params.id}`);
        this.editedSpeaker = response.data;
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
</style>





  
  