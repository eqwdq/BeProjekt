<template>
  <br><br><br><br><br><br><br><br><br><br><br>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10"> <!-- Adjusted column width to make fields longer -->
        <div class="card">
          <div class="card-header text-center">{{ $t('adminRegister') }}</div>

          <div class="card-body">
            <form @submit.prevent="register">
              <br><br><br><br><br>
              <div class="form-group row">
                <label for="name" class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label> <!-- Adjusted column width -->
                <div class="col-md-8"> <!-- Adjusted column width -->
                  <input v-model="name" id="name" type="text" class="form-control" required autofocus>
                </div>
              </div>

              <div class="form-group row">
                <label for="email" class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label> <!-- Adjusted column width -->
                <div class="col-md-8"> <!-- Adjusted column width -->
                  <input v-model="email" id="email" type="email" class="form-control" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="password" class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label> <!-- Adjusted column width -->
                <div class="col-md-8"> <!-- Adjusted column width -->
                  <input v-model="password" id="password" type="password" class="form-control" required>
                </div>
              </div>

              <div class="form-group row">
                <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ $t('confirmPassword') }}</label> <!-- Adjusted column width -->
                <div class="col-md-8"> <!-- Adjusted column width -->
                  <input v-model="passwordConfirm" id="password-confirm" type="password" class="form-control" required>
                </div>
              </div>
              <br><br><br>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-3 text-center"> <!-- Adjusted column width and offset -->
                  <button type="submit" class="btn btn-primary purple-button">{{ $t('register') }}</button>
                </div>
              </div>
            </form>
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
      name: '',
      email: '',
      password: '',
      passwordConfirm: ''
    };
  },
  methods: {
    register() {
      axios.post('/admin/register', {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.passwordConfirm
      })
      .then(response => {
        alert('Admin registered successfully!');
        this.$router.push({ name: 'admin-login' });  // Navigate to AdminLogin
      })
      .catch(error => {
        console.error(error);
        if (error.response && error.response.data.errors) {
          alert(JSON.stringify(error.response.data.errors));
        } else {
          alert('An error occurred');
        }
      });
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



  
  