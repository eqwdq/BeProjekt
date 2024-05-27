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
            <label for="programDescription">Description:</label>
            <textarea class="form-control" id="programDescription" v-model="newProgram.description" required></textarea>
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
          </div><br><br><br><br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <br><br><br><br>
        <h3>Programs</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Day</th>
            <th>Time</th>
            <th>Title</th>
            <th>Description</th>
            <th>Speaker</th>
            <th>Speaker Link</th>
            <th>Image</th>
            <th>Actions</th> <!-- Add a table header for actions -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="program in programs" :key="program.id">
            <td>{{ program.day }}</td>
            <td>{{ program.time }}</td>
            <td>{{ program.title }}</td>
            <td>{{ program.description }}</td>
            <td>{{ program.speaker }}</td>
            <td>{{ program.speaker_link }}</td>
            <td>
              <img :src="program.image" alt="Program Image" style="max-width: 100px;">
            </td>
            <td> <!-- Add a table cell for buttons -->
              <!-- Edit button -->
              <router-link :to="{ name: 'admin-edit-program', params: { id: program.id } }" class="btn btn-warning">Edit</router-link>

              <!-- Delete button -->
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
          description: '',
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
      onSubmit() {
        const formData = new FormData();
        formData.append('day', this.newProgram.day);
        formData.append('time', this.newProgram.time);
        formData.append('title', this.newProgram.title);
        formData.append('description', this.newProgram.description);
        formData.append('speaker', this.newProgram.speaker);
        formData.append('speaker_link', this.newProgram.speaker_link);
        formData.append('image', this.newProgram.image);
  
        axios.post('/admin/programs', formData)
          .then(() => {
            // Clear form fields or perform other actions
            this.newProgram.day = '';
            this.newProgram.time = '';
            this.newProgram.title = '';
            this.newProgram.description = '';
            this.newProgram.speaker = '';
            this.newProgram.speaker_link = '';
            this.newProgram.image = null;
  
            // Refresh the list of programs
            this.fetchPrograms();
          })
          .catch(error => {
            console.error('Error adding program:', error);
          });
      },
      deleteProgram(program) {
        if (confirm("Are you sure you want to delete this program?")) {
          axios.delete(`/admin/programs/${program.id}`)
            .then(() => {
              // Refresh the list of programs after deletion
              this.fetchPrograms();
            })
            .catch(error => {
              console.error('Error deleting program:', error);
            });
        }
      },
      fetchPrograms() {
  // Fetch the list of programs from the server
  axios.get('/api/admin/programs') // Update this to fetch a specific program by ID
    .then(response => {
      this.programs = response.data;
    })
    .catch(error => {
      console.error('Error fetching programs:', error);
    });
}

    },
    created() {
      // Fetch programs when the component is created
      this.fetchPrograms();
    }
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  
  
  
  