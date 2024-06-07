<template>
  <div>
    <AdminHeader />
    <div class="container">
      <br><br><br><br>
      <h3>Add New Speaker</h3><br><br><br><br>
      <form @submit.prevent="onSubmit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="speakerName">Name:</label>
          <input type="text" class="form-control" id="speakerName" v-model="newSpeaker.name" required>
        </div>
        <div class="form-group">
          <label for="speakerShortDescription">Short Description:</label>
          <textarea class="form-control" id="speakerShortDescription" v-model="newSpeaker.short_description" required></textarea>
        </div>
        <div class="form-group">
          <label for="speakerLongDescription">Long Description:</label>
          <textarea class="form-control" id="speakerLongDescription" v-model="newSpeaker.long_description" required></textarea>
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
        </div><br><br>
        <button type="submit" class="btn btn-primary purple-button">Submit</button>
      </form>
      <br><br><br><br><br><br><br><br>
      <!-- Table to display speakers -->
      <h3>Speakers</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Short Description</th>
            <th>Long Description</th>
            <th>Instagram</th>
            <th>YouTube</th>
            <th>Image</th>
            <th>Actions</th> <!-- Add a table header for actions -->
          </tr>
        </thead>
        <tbody>
          <tr v-for="speaker in speakers" :key="speaker.id">
            <td>{{ speaker.name }}</td>
            <td>{{ speaker.short_description }}</td>
            <td>{{ speaker.long_description }}</td>
            <td>{{ speaker.instagram }}</td>
            <td>{{ speaker.youtube }}</td>
            <td>
              <img :src="speaker.image" alt="Speaker Image" style="max-width: 100px;">
            </td>
            <td> <!-- Add a table cell for buttons -->
              <!-- Edit button -->
              <router-link :to="{ name: 'admin-edit-speaker', params: { id: speaker.id } }" class="btn btn-warning purple-button">Edit</router-link>

              <!-- Delete button -->
              <button @click="deleteSpeaker(speaker)" class="btn btn-danger">Delete</button>
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
      newSpeaker: {
        name: '',
        short_description: '',
        long_description: '',
        image: null,
        instagram: '',
        youtube: ''
      },
      speakers: []
    };
  },
  methods: {
    onFileChange(e) {
      this.newSpeaker.image = e.target.files[0];
    },
    onSubmit() {
      const formData = new FormData();
      formData.append('name', this.newSpeaker.name);
      formData.append('short_description', this.newSpeaker.short_description);
      formData.append('long_description', this.newSpeaker.long_description);
      formData.append('image', this.newSpeaker.image);
      formData.append('instagram', this.newSpeaker.instagram);
      formData.append('youtube', this.newSpeaker.youtube);

      axios.post('/admin/speakers', formData)
        .then(() => {
          // Clear form fields or perform other actions
          this.newSpeaker.name = '';
          this.newSpeaker.short_description = '';
          this.newSpeaker.long_description = '';
          this.newSpeaker.image = null;
          this.newSpeaker.instagram = '';
          this.newSpeaker.youtube = '';

          // Refresh the list of speakers
          this.fetchSpeakers();
        })
        .catch(error => {
          console.error('Error adding speaker:', error);
        });
    },
    deleteSpeaker(speaker) {
      if (confirm("Are you sure you want to delete this speaker?")) {
        axios.delete(`/admin/speakers/${speaker.id}`)
          .then(() => {
            // Refresh the list of speakers after deletion
            this.fetchSpeakers();
          })
          .catch(error => {
            console.error('Error deleting speaker:', error);
          });
      }
    },
    fetchSpeakers() {
      // Fetch the list of speakers from the server
      axios.get('/api/admin/speakers')
        .then(response => {
          this.speakers = response.data;
        })
        .catch(error => {
          console.error('Error fetching speakers:', error);
        });
    }
  },
  created() {
    // Fetch speakers when the component is created
    this.fetchSpeakers();
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





  
  