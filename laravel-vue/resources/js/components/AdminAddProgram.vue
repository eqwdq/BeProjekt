<template>
  <div>
    <AdminHeader />
    <div class="container">
      <br><br><br><br>
      <h3>Add New Program</h3><br><br><br><br>
      <form @submit.prevent="onSubmit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="programDay">Day:</label>
          <input type="text" class="form-control" id="programDay" v-model="newProgram.day" required>
        </div>
        <div class="form-group">
          <label for="programTime">Time:</label>
          <input type="text" class="form-control" id="programTime" v-model="newProgram.time" required>
        </div>
        <div class="form-group">
          <label for="programTitle">Title:</label>
          <input type="text" class="form-control" id="programTitle" v-model="newProgram.title" required>
        </div>
        <div class="form-group">
          <label for="programStage">Stage:</label>
          <input type="text" class="form-control" id="programStage" v-model="newProgram.stage" required>
        </div>
        <div class="form-group">
          <label for="programShortDescription">Short Description:</label>
          <textarea class="form-control" id="programShortDescription" v-model="newProgram.short_description" required></textarea>
        </div>
        <div class="form-group">
          <label for="programLongDescription">Long Description:</label>
          <textarea class="form-control" id="programLongDescription" v-model="newProgram.long_description" required></textarea>
        </div>
        <div class="form-group">
          <label for="programSpeaker">Speaker:</label>
          <input type="text" class="form-control" id="programSpeaker" v-model="newProgram.speaker" required>
        </div>
        <div class="form-group">
          <label for="programSpeakerLink">Speaker Link:</label>
          <input type="url" class="form-control" id="programSpeakerLink" v-model="newProgram.speaker_link">
        </div>
        <div class="form-group">
          <label for="programImage">Image:</label>
          <input type="file" class="form-control" id="programImage" @change="onFileChange">
        </div>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary purple-button">Submit</button>
      </form>
      <br><br><br><br>
      <h3>Programs</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Day</th>
            <th>Time</th>
            <th>Title</th>
            <th>Stage</th>
            <th>Short Description</th>
            <th>Long Description</th>
            <th>Speaker</th>
            <th>Speaker Link</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="program in programs" :key="program.id">
            <td>{{ program.day }}</td>
            <td>{{ program.time }}</td>
            <td>{{ program.title }}</td>
            <td>{{ program.stage }}</td>
            <td>{{ program.short_description }}</td>
            <td>{{ program.long_description }}</td>
            <td>{{ program.speaker }}</td>
            <td>{{ program.speaker_link }}</td>
            <td>
              <img :src="program.image" alt="Program Image" style="max-width: 100px;">
            </td>
            <td>
              <router-link :to="{ name: 'admin-edit-program', params: { id: program.id } }" class="btn btn-warning purple-button">Edit</router-link>
              <button @click="deleteProgram(program)" class="btn btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
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
      newProgram: {
        day: '',
        time: '',
        title: '',
        stage: '', // Add stage
        short_description: '',
        long_description: '',
        speaker: '',
        speaker_link: '',
        image: null,
      },
      programs: []
    };
  },
  methods: {
    onFileChange(e) {
      this.newProgram.image = e.target.files[0];
    },
    async onSubmit() {
      const formData = new FormData();
      formData.append('day', this.newProgram.day);
      formData.append('time', this.newProgram.time);
      formData.append('title', this.newProgram.title);
      formData.append('stage', this.newProgram.stage); // Append stage
      formData.append('short_description', this.newProgram.short_description);
      formData.append('long_description', this.newProgram.long_description);
      formData.append('speaker', this.newProgram.speaker);
      formData.append('speaker_link', this.newProgram.speaker_link);
      formData.append('image', this.newProgram.image);

      try {
        await axios.post('/admin/programs', formData);
        this.newProgram = {
          day: '',
          time: '',
          title: '',
          stage: '', // Reset stage
          short_description: '',
          long_description: '',
          speaker: '',
          speaker_link: '',
          image: null
        };
        this.fetchPrograms(); // Fetch updated list after submission
      } catch (error) {
        console.error('Error adding program:', error);
      }
    },
    async deleteProgram(program) {
      if (confirm("Are you sure you want to delete this program?")) {
        try {
          await axios.delete(`/admin/programs/${program.id}`);
          this.fetchPrograms(); // Fetch updated list after deletion
        } catch (error) {
          console.error('Error deleting program:', error);
        }
      }
    },
    async fetchPrograms() {
      try {
        const response = await axios.get('/api/admin/programs');
        this.programs = response.data;
      } catch (error) {
        console.error('Error fetching programs:', error);
      }
    }
  },
  created() {
    this.fetchPrograms(); // Fetch programs when component is created
  }
};
</script>

<style scoped>
/* Add your custom styles here */
.purple-button {
  background-color: rgb(139, 72, 247);
  border-color: purple;
}

.purple-button:hover {
  background-color: rgb(139, 72, 247);
  border-color: rgb(185, 60, 238);
}
</style>




  
  
  
  
  
  
  
  