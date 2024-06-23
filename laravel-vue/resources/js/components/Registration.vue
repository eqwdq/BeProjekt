<template>
  <div>
    <Header />
    <div class="container">
      <!-- Registration form -->
      <br><br><br><br><br><br><br><br>
      <h3>Zaregistrujte sa na prednášku</h3>
      <br><br><br><br><br>
      <form @submit.prevent="register">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" v-model="name" required />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" v-model="email" required />
        </div>
        <div class="form-group">
          <label for="program">Select Program:</label>
          <select class="form-control" id="program" v-model="selectedProgram" required>
            <option v-for="program in programs" :key="program.id" :value="program.id">
              {{ program.title }} - {{ program.day }} {{ program.time }} (Capacity: {{ program.capacity }})
            </option>
          </select>
        </div>
        <div v-if="errors.length" class="alert alert-danger">
          <ul>
            <li v-for="error in errors" :key="error">{{ error }}</li>
          </ul>
        </div>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary purple-button">Register</button>
      </form>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

      <!-- Check user registrations -->
      <h3>Už ste zaregistovaný?</h3>
      <br><br><br><br><br>
      <form @submit.prevent="fetchUserRegistrations">
        <div class="form-group">
          <label for="user-email">Email:</label>
          <input type="email" class="form-control" id="user-email" v-model="userEmail" required />
        </div>
        <br><br><br><br>
        <button type="submit" class="btn btn-primary purple-button">Check Registrations</button>
      </form>
      <br><br><br><br>
      <div v-if="userRegistrations.length > 0">
        <h4>Your Registrations:</h4>
        <ul>
          <li v-for="registration in userRegistrations" :key="registration.id">
            {{ registration.program.title }} - {{ registration.program.day }} {{ registration.program.time }}
            <button @click="unregister(registration.id)" class="btn btn-danger">Unregister</button>
          </li>
        </ul>
      </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from './Header.vue';
import Footer from './Footer.vue';
import axios from 'axios';

export default {
  components: {
    Header,
    Footer,
  },
  data() {
    return {
      name: '',
      email: '',
      selectedProgram: '',
      programs: [],
      errors: [], // Array to store validation errors
      userEmail: '', // Email for checking registrations
      userRegistrations: [] // Array to store user registrations
    };
  },
  methods: {
    async fetchPrograms() {
      try {
        const response = await axios.get('/api/admin/programs');
        this.programs = response.data;
        console.log('Programs fetched:', this.programs); // Debugging line
      } catch (error) {
        console.error('Error fetching programs:', error);
      }
    },
    async register() {
      try {
        this.errors = []; // Clear previous errors
        console.log('Selected Program ID:', this.selectedProgram); // Debugging line
        console.log('Selected Program:', this.programs.find(p => p.id === this.selectedProgram)); // Debugging line
        const response = await axios.post('/api/register', {
          name: this.name,
          email: this.email,
          program_id: this.selectedProgram,
        });
        alert('Registration successful! Please check your email for confirmation.');
      } catch (error) {
        console.error('Error registering:', error);
        if (error.response && error.response.data.errors) {
          // Capture validation errors
          this.errors = Object.values(error.response.data.errors).flat();
        } else {
          alert('There was an error with your registration. Please try again.');
        }
      }
    },
    async fetchUserRegistrations() {
      try {
        const response = await axios.post('/api/user-registrations', {
          email: this.userEmail,
        });
        this.userRegistrations = response.data;
      } catch (error) {
        console.error('Error fetching user registrations:', error);
      }
    },
    async unregister(registrationId) {
      try {
        await axios.delete(`/api/unregister/${registrationId}`);
        this.userRegistrations = this.userRegistrations.filter(r => r.id !== registrationId);
        alert('Successfully unregistered.');
      } catch (error) {
        console.error('Error unregistering:', error);
        alert('There was an error while trying to unregister. Please try again.');
      }
    }
  },
  created() {
    this.fetchPrograms();
  },
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
