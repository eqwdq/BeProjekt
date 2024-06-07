<template>
  <div>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{ $t('adminLogin') }}</div>
            <br><br><br><br><br>

            <div class="card-body">
              <form @submit.prevent="login">
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ $t('email') }}</label>
                  <div class="col-md-6">
                    <input v-model="email" id="email" type="email" class="form-control" required autofocus>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ $t('password') }}</label>
                  <div class="col-md-6">
                    <input v-model="password" id="password" type="password" class="form-control" required>
                  </div>
                </div>

                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4"><br><br><br>
                    <button type="submit" class="btn btn-primary">{{ $t('login') }}</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      email: '',
      password: ''
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('/admin/login', {
          email: this.email,
          password: this.password
        });
        this.handleSuccessfulLogin(response);
      } catch (error) {
        this.handleLoginError(error);
      }
    },
    handleSuccessfulLogin(response) {
      // Handle successful login
      console.log('Logged in successfully', response.data);

      // Store token and user info in local storage or cookies
      localStorage.setItem('admin-token', response.data.token);
      localStorage.setItem('admin', JSON.stringify(response.data.admin));
      
      // Redirect to AdminAddSpeaker.vue
      this.$router.push({ name: 'admin-add-speaker' });
    },
    handleLoginError(error) {
      console.error('Login failed', error);
      // Handle login error, e.g., display error message
    }
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

.text-center {
  text-align: center;
}

.container {
  justify-content: center;
  align-items: center;
  height: 80vh;
}

.btn-primary {
  background-color: rgb(139, 72, 247);
  border-color: purple;
}

.btn-primary:hover {
  background-color: rgb(139, 72, 247);
  border-color: rgb(185, 60, 238);
}
</style>
