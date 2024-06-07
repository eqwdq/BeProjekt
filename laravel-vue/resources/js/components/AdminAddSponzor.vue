<template>
  <div>
    <AdminHeader />
    <div class="container">
      <br><br><br><br>
      <h3>Add New Sponsor</h3><br><br><br><br>
      <form @submit.prevent="onSubmit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="link">Link:</label>
          <input type="url" class="form-control" id="link" v-model="newSponsor.link" required>
          <div v-if="errors.link" class="text-danger">{{ errors.link[0] }}</div>
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" class="form-control" id="image" @change="onFileChange" required>
          <div v-if="errors.image" class="text-danger">{{ errors.image[0] }}</div>
        </div>
        <br><br><br><br>
        <button type="submit" class="btn purple-button text-white">Submit</button>
      </form>
      <div v-if="errors" class="alert alert-danger">
        <div v-for="(error, field) in errors" :key="field">{{ error[0] }}</div>
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
      newSponsor: {
        link: '',
        image: null,
      },
      errors: {}
    };
  },
  methods: {
    onFileChange(e) {
      this.newSponsor.image = e.target.files[0];
    },
    async onSubmit() {
      try {
        const formData = new FormData();
        formData.append('link', this.newSponsor.link);
        formData.append('image', this.newSponsor.image);

        // Log the form data for debugging
        console.log('Submitting form data:', {
          link: this.newSponsor.link,
          image: this.newSponsor.image,
        });

        await axios.post('/admin/sponsors', formData);
        // Clear form fields
        this.newSponsor.link = '';
        this.newSponsor.image = null;
        this.errors = {};
      } catch (error) {
        if (error.response && error.response.status === 422) {
          this.errors = error.response.data.errors;
        } else {
          console.error('Error adding sponsor:', error);
        }
      }
    }
  }
};
</script>

<style scoped>
/* Add your custom styles here */
.text-danger {
  color: red;
}

.purple-button {
  background-color: rgb(139, 72, 247);
  border-color: purple;
  color: white; /* Ensure the button text is white */
}

.purple-button:hover {
  background-color: rgb(139, 72, 247);
  border-color: rgb(185, 60, 238);
  color: white; /* Ensure the button text remains white on hover */
}
</style>

  
  
  