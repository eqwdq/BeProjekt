<template>
    <div>
      <AdminHeader />
      <div class="container">
        <br><br><br><br>
        <h3>Registered People</h3>
        <br><br><br><br>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Program</th>
              <th>Program Date</th>
              <th>Program Time</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="registration in registrations" :key="registration.id">
              <td>{{ registration.name }}</td>
              <td>{{ registration.email }}</td>
              <td>{{ registration.program.title }}</td>
              <td>{{ registration.program.day }}</td>
              <td>{{ registration.program.time }}</td>
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
        registrations: []
      };
    },
    methods: {
      async fetchRegistrations() {
        try {
          const response = await axios.get('/api/admin/registrations');
          this.registrations = response.data;
        } catch (error) {
          console.error('Error fetching registrations:', error);
        }
      }
    },
    created() {
      this.fetchRegistrations();
    }
  };
  </script>
  
  <style scoped>
  /* Add your custom styles here */
  </style>
  