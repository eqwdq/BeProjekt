<template>
    <div>
      <AdminHeader />
      <div class="container">
        <br><br><br><br>
        <h3>Edit Program</h3><br><br><br><br>
        <form @submit.prevent="onSubmit" enctype="multipart/form-data">
          <div class="form-group">
            <label for="day">Day:</label>
            <input type="text" class="form-control" id="day" v-model="editedProgram.day" required>
          </div>
          <div class="form-group">
            <label for="time">Time:</label>
            <input type="text" class="form-control" id="time" v-model="editedProgram.time" required>
          </div>
          <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" v-model="editedProgram.title" required>
          </div>
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" v-model="editedProgram.description" required></textarea>
          </div>
          <div class="form-group">
            <label for="speaker">Speaker:</label>
            <input type="text" class="form-control" id="speaker" v-model="editedProgram.speaker" required>
          </div>
          <div class="form-group">
            <label for="speakerLink">Speaker Link:</label>
            <input type="url" class="form-control" id="speakerLink" v-model="editedProgram.speaker_link">
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" @change="onFileChange">
          </div><br><br><br><br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div v-if="validationErrors.length">
          <h4>Validation Errors:</h4>
          <ul>
            <li v-for="(error, index) in validationErrors" :key="index">{{ error }}</li>
          </ul>
        </div>
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
        editedProgram: {
          id: null,
          day: '',
          time: '',
          title: '',
          description: '',
          speaker: '',
          speaker_link: '',
          image: null
        },
        validationErrors: []
      };
    },
    methods: {
      onFileChange(e) {
        this.editedProgram.image = e.target.files[0];
      },
      async onSubmit() {
        try {
          const formData = new FormData();
          formData.append('day', this.editedProgram.day);
          formData.append('time', this.editedProgram.time);
          formData.append('title', this.editedProgram.title);
          formData.append('description', this.editedProgram.description);
          formData.append('speaker', this.editedProgram.speaker);
          formData.append('speaker_link', this.editedProgram.speaker_link);
          if (this.editedProgram.image) {
            formData.append('image', this.editedProgram.image);
          }
  
          const response = await axios.put(`/api/admin/programs/${this.editedProgram.id}`, formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          });
  
          if (response.status === 200) {
            this.$router.push({ name: 'Program' });
          }
        } catch (error) {
          console.error('Error updating program:', error);
          if (error.response && error.response.data && error.response.data.errors) {
            this.validationErrors = Object.values(error.response.data.errors).flat();
          }
        }
      },
      async fetchProgramData() {
        try {
          const response = await axios.get(`/api/admin/programs/${this.$route.params.id}`);
          this.editedProgram = response.data;
          console.log('Fetched program data:', this.editedProgram); // Log fetched data for debugging
        } catch (error) {
          console.error('Error fetching program data:', error);
        }
      }
    },
    async mounted() {
      await this.fetchProgramData();
    }
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  
  

  
  