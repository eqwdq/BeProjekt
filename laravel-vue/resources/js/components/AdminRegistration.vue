<template>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">{{ $t('adminRegister') }}</div>
  
            <div class="card-body">
              <form @submit.prevent="register">
                <br><br><br><br><br>
                <div class="form-group row">
                  <label for="name" class="col-md-4 col-form-label text-md-right">{{ $t('name') }}</label>
                  <div class="col-md-6">
                    <input v-model="name" id="name" type="text" class="form-control" required autofocus>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ $t('email') }}</label>
                  <div class="col-md-6">
                    <input v-model="email" id="email" type="email" class="form-control" required>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ $t('password') }}</label>
                  <div class="col-md-6">
                    <input v-model="password" id="password" type="password" class="form-control" required>
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ $t('confirmPassword') }}</label>
                  <div class="col-md-6">
                    <input v-model="passwordConfirm" id="password-confirm" type="password" class="form-control" required>
                  </div>
                </div>
  
                <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">{{ $t('register') }}</button>
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
  </style>
  
  
  