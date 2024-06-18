<template>
    <div>
      <AdminHeader />
      <div class="container">
        <br><br><br><br>
        <h3>Add New Review</h3><br><br><br><br>
        <form @submit.prevent="onSubmit" enctype="multipart/form-data">
          <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" v-model="newReview.description" required></textarea>
            <div v-if="errors.description" class="text-danger">{{ errors.description[0] }}</div>
          </div>
          <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control" id="image" @change="onFileChange" required>
            <div v-if="errors.image" class="text-danger">{{ errors.image[0] }}</div>
          </div>
          <br><br><br><br>
          <button type="submit" class="btn btn-primary purple-button">Submit</button>
        </form>
        <br><br><br><br>
        <h3>Reviews</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Description</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="review in reviews" :key="review.id">
              <td>{{ review.description }}</td>
              <td>
                <img :src="review.image" alt="Review Image" style="max-width: 100px;">
              </td>
              <td>
                <router-link :to="{ name: 'admin-edit-review', params: { id: review.id } }" class="btn btn-warning purple-button">Edit</router-link>
                <button @click="deleteReview(review)" class="btn btn-danger">Delete</button>
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
        newReview: {
          description: '',
          image: null,
        },
        reviews: [],
        errors: {}
      };
    },
    methods: {
      onFileChange(e) {
        this.newReview.image = e.target.files[0];
      },
      async onSubmit() {
        const formData = new FormData();
        formData.append('description', this.newReview.description);
        formData.append('image', this.newReview.image);
  
        try {
          await axios.post('/admin/reviews', formData);
          this.newReview = {
            description: '',
            image: null,
          };
          this.fetchReviews(); // Fetch updated list after submission
        } catch (error) {
          if (error.response && error.response.status === 422) {
            this.errors = error.response.data.errors;
          } else {
            console.error('Error adding review:', error);
          }
        }
      },
      async deleteReview(review) {
        if (confirm("Are you sure you want to delete this review?")) {
          try {
            await axios.delete(`/admin/reviews/${review.id}`);
            this.fetchReviews(); // Fetch updated list after deletion
          } catch (error) {
            console.error('Error deleting review:', error);
          }
        }
      },
      async fetchReviews() {
        try {
          const response = await axios.get('/api/admin/reviews');
          this.reviews = response.data;
        } catch (error) {
          console.error('Error fetching reviews:', error);
        }
      }
    },
    created() {
      this.fetchReviews(); // Fetch reviews when component is created
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
  .text-danger {
    color: red;
  }
  </style>
  
  