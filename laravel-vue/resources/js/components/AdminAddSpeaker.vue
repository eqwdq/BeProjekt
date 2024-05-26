// resources/js/components/AddSpeaker.vue
<template>
  <div>
    <AdminHeader />
    <div class="container">
      <h3>Add New Speaker</h3>
      <form @submit.prevent="onSubmit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="speakerName">Name:</label>
          <input type="text" class="form-control" id="speakerName" v-model="newSpeaker.name" required>
        </div>
        <div class="form-group">
          <label for="speakerDescription">Description:</label>
          <textarea class="form-control" id="speakerDescription" v-model="newSpeaker.description" required></textarea>
        </div>
        <div class="form-group">
          <label for="speakerImage">Image:</label>
          <input type="file" class="form-control" id="speakerImage" @change="onFileChange">
        </div>
        <div class="form-group">
          <label for="speakerInstagram">Instagram:</label>
          <input type="url" class="form-control" id="speakerInstagram" v-model="newSpeaker.instagram">
        </div>
        <div class="form-group">
          <label for="speakerYouTube">YouTube:</label>
          <input type="url" class="form-control" id="speakerYouTube" v-model="newSpeaker.youtube">
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
      newSpeaker: {
        name: '',
        description: '',
        image: null,
        instagram: '',
        youtube: ''
      }
    };
  },
  methods: {
    onFileChange(e) {
      this.newSpeaker.image = e.target.files[0];
    },
    onSubmit() {
      const formData = new FormData();
      formData.append('name', this.newSpeaker.name);
      formData.append('description', this.newSpeaker.description);
      formData.append('image', this.newSpeaker.image);
      formData.append('instagram', this.newSpeaker.instagram);
      formData.append('youtube', this.newSpeaker.youtube);

      axios.post('/admin/speakers', formData)
        .then(() => {
          // Clear form fields or perform other actions
          this.newSpeaker.name = '';
          this.newSpeaker.description = '';
          this.newSpeaker.image = null;
          this.newSpeaker.instagram = '';
          this.newSpeaker.youtube = '';
        })
        .catch(error => {
          console.error('Error adding speaker:', error);
        });
    }
  }
};

</script>

<style scoped>
/* Add your custom styles here */
</style>


  
  