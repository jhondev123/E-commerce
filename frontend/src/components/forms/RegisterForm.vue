<!-- src/components/RegisterForm.vue -->
<template>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="card p-4 shadow-sm" style="width: 25rem;">
        <h2 class="card-title text-center mb-4 text-bold">Register</h2>
    <form @submit.prevent="register">
      <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input id="name" v-model="form.name" type="text" required class="form-control" />
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input id="email" v-model="form.email" type="email" required class="form-control" />
      </div class="mb-3">
      <div>
        <label for="password" class="form-label">Password:</label>
        <input id="password" v-model="form.password" type="password" required class="form-control" />
      </div>
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password:</label>
        <input id="password_confirmation" v-model="form.password_confirmation" type="password" required class="form-control" />
      </div>
      <button type="submit" class="btn btn-primary w-100">Register</button>
      <div v-if="error" class="mt-3 text-danger">{{ error }}</div>
    </form>
    <div class="text-center mt-3">
        <router-link to="/login" class="text-primary">Already have an account? login</router-link>
      </div>
    </div>  
    </div>  
  </template>
  
  <script>
  import { ref } from 'vue';
  import axiosInstance from '../../configs/axiosConfig';
  
  export default {
    setup() {
      const form = ref({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
      });
  
      const register = async () => {
        try {
          const response = await axiosInstance.post('/register', form.value);
          router.push({ name: 'login' });
        } catch (error) {
          
        }
      };
  
      return {
        form,
        register
      };
    }
  };
  </script>
  