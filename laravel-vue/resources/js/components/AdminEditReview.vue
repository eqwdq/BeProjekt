<template>
    <div>
      <AdminHeader />
      <div class="container">
        <br><br><br><br>
        <h3>Edit Review</h3><br><br><br><br>
        <form @submit.prevent="save">
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" v-model="review.description"></textarea>
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" @change="onFileChange">
          </div>
          <br><br><br><br>
          <button type="submit" class="btn btn-primary">Submit</button>
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
        review: {
          id: null,
          description: '',
          image: null
        },
        errors: []
      };
    },
    created() {
      this.fetchReviewData();
    },
    methods: {
      async fetchReviewData() {
        try {
          const response = await axios.get(`/api/admin/reviews/${this.$route.params.id}`);
          this.review = response.data;
          console.log('Fetched review data:', this.review); // Log fetched data for debugging
        } catch (error) {
          console.error('Error fetching review data:', error);
        }
      },
      onFileChange(e) {
        this.review.image = e.target.files[0];
      },
      async save() {
        const formData = new FormData();
        formData.append('_method', 'PUT'); // Include the PUT method for Laravel
  
        if (this.review.description) formData.append('description', this.review.description);
        if (this.review.image) formData.append('image', this.review.image);
  
        try {
          const response = await axios.post(`/api/admin/reviews/${this.review.id}`, formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          });
  
          if (response.status === 200) {
            alert("Review updated successfully");
            this.$router.push({ name: 'admin-add-review' });
          }
        } catch (error) {
          console.error('Error updating review:', error);
          if (error.response && error.response.data.errors) {
            this.errors = Object.values(error.response.data.errors).flat();
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
  
  