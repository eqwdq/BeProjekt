<template>
  <div>
    <AdminHeader />
    <div class="container">
      <br><br><br><br>
      <h3>Edit Program</h3><br><br><br><br>
      <form @submit.prevent="save">
        <div class="form-group">
          <label for="programDay">Day:</label>
          <input type="text" class="form-control" id="programDay" v-model="program.day">
        </div>
        <div class="form-group">
          <label for="programTime">Time:</label>
          <input type="text" class="form-control" id="programTime" v-model="program.time">
        </div>
        <div class="form-group">
          <label for="programTitle">Title:</label>
          <input type="text" class="form-control" id="programTitle" v-model="program.title">
        </div>
        <div class="form-group">
          <label for="programStage">Stage:</label>
          <input type="text" class="form-control" id="programStage" v-model="program.stage">
        </div>
        <div class="form-group">
          <label for="programCapacity">Capacity:</label>
          <input type="number" class="form-control" id="programCapacity" v-model="program.capacity">
        </div>
        <div class="form-group">
          <label for="programShortDescription">Short Description:</label>
          <textarea class="form-control" id="programShortDescription" v-model="program.short_description"></textarea>
        </div>
        <div class="form-group">
          <label for="programLongDescription">Long Description:</label>
          <textarea class="form-control" id="programLongDescription" v-model="program.long_description"></textarea>
        </div>
        <div class="form-group">
          <label for="programSpeaker">Speaker:</label>
          <input type="text" class="form-control" id="programSpeaker" v-model="program.speaker">
        </div>
        <div class="form-group">
          <label for="programSpeakerLink">Speaker Link:</label>
          <input type="url" class="form-control" id="programSpeakerLink" v-model="program.speaker_link">
        </div>
        <div class="form-group">
          <label for="programImage">Image:</label>
          <input type="file" class="form-control" id="programImage" @change="onFileChange">
        </div>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary purple-button">Save</button>
      </form>
      <div v-if="errors.length">
        <h4>Validation Errors:</h4>
        <ul>
          <li v-for="(error, index) in errors" :key="index">{{ error }}</li>
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
      program: {
        id: null,
        day: '',
        time: '',
        title: '',
        stage: '',
        capacity: '', // Add capacity
        short_description: '',
        long_description: '',
        speaker: '',
        speaker_link: '',
        image: null
      },
      errors: []
    };
  },
  created() {
    this.fetchProgramData();
  },
  methods: {
    async fetchProgramData() {
      try {
        const response = await axios.get(`/api/admin/programs/${this.$route.params.id}`);
        this.program = response.data;
        console.log('Fetched program data:', this.program); // Log fetched data for debugging
      } catch (error) {
        console.error('Error fetching program data:', error);
      }
    },
    onFileChange(e) {
      this.program.image = e.target.files[0];
    },
    async save() {
      try {
        const formData = new FormData();
        formData.append('_method', 'PUT'); // Include the PUT method for Laravel

        if (this.program.day) formData.append('day', this.program.day);
        if (this.program.time) formData.append('time', this.program.time);
        if (this.program.title) formData.append('title', this.program.title);
        if (this.program.stage) formData.append('stage', this.program.stage);
        if (this.program.capacity) formData.append('capacity', this.program.capacity);
        if (this.program.short_description) formData.append('short_description', this.program.short_description);
        if (this.program.long_description) formData.append('long_description', this.program.long_description);
        if (this.program.speaker) formData.append('speaker', this.program.speaker);
        if (this.program.speaker_link) formData.append('speaker_link', this.program.speaker_link);
        if (this.program.image) formData.append('image', this.program.image);

        const response = await axios.post(`/api/admin/programs/${this.program.id}`, formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        });

        if (response.status === 200) {
          alert("Program updated successfully");
          this.$router.push({ name: 'AdminAddProgram' });
        }
      } catch (error) {
        console.error('Error updating program:', error);
        if (error.response && error.response.data.errors) {
          this.errors = Object.values(error.response.data.errors).flat();
        }
      }
    }
  }
};
</script>

<style scoped>
.purple-button {
  background-color: rgb(139, 72, 247);
  border-color: purple;
}

.purple-button:hover {
  background-color: rgb(139, 72, 247);
  border-color: rgb(185, 60, 238);
}
</style>
