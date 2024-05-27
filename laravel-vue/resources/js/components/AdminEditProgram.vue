<template>
    <div>
      <AdminHeader />
      <div class="container">
        <h3>Edit Program</h3>
        <form @submit.prevent="onSubmit">
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
            <input type="text" class="form-control" id="speakerLink" v-model="editedProgram.speakerLink" required>
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="text" class="form-control" id="image" v-model="editedProgram.image" required>
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
        editedProgram: {
          id: null,
          day: '',
          time: '',
          title: '',
          description: '',
          speaker: '',
          speakerLink: '',
          image: ''
        }
      };
    },
    methods: {
      async onSubmit() {
        try {
          await axios.put(`/admin/programs/${this.editedProgram.id}`, this.editedProgram);
          this.$router.push({ name: 'Program' });
        } catch (error) {
          console.error('Error updating program:', error);
        }
      },
      async fetchProgramData() {
        try {
          const response = await axios.get(`/admin/programs/${this.$route.params.id}`);
          this.editedProgram = response.data;
        } catch (error) {
          console.error('Error fetching program data:', error);
        }
      }
    },
    mounted() {
      this.fetchProgramData();
    }
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  