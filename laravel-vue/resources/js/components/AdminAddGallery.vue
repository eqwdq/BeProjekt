<template>
  <div>
    <AdminHeader />
    <div class="container">
      <br><br><br><br>
      <h3>Add New Gallery Image</h3><br><br><br><br>
      <form @submit.prevent="onSubmit" enctype="multipart/form-data">
        <div class="form-group">
          <label for="category">Category:</label>
          <select class="form-control" id="category" v-model="newImage.category" required>
            <option value="" disabled>Select a category</option>
            <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
          </select>
          <div v-if="errors.category" class="text-danger">{{ errors.category[0] }}</div>
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" class="form-control" id="image" @change="onFileChange" required>
          <div v-if="errors.image" class="text-danger">{{ errors.image[0] }}</div>
        </div>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
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
      newImage: {
        category: '',
        image: null,
      },
      categories: ['2023/2024', '2024/2025'],
      errors: {}
    };
  },
  methods: {
    onFileChange(e) {
      this.newImage.image = e.target.files[0];
    },
    async onSubmit() {
      try {
        const formData = new FormData();
        formData.append('category', this.newImage.category);
        formData.append('image', this.newImage.image);

        // Log the form data for debugging
        console.log('Submitting form data:', {
          category: this.newImage.category,
          image: this.newImage.image,
        });

        await axios.post('/admin/gallery', formData);
        // Clear form fields
        this.newImage.category = '';
        this.newImage.image = null;
        this.errors = {};
      } catch (error) {
        if (error.response && error.response.status === 422) {
          this.errors = error.response.data.errors;
        } else {
          console.error('Error adding gallery image:', error);
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
</style>

  