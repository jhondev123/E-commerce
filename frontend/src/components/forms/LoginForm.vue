<template>
    <div class="d-flex justify-content-center align-items-center vh-100">
      <div class="card p-4 shadow-sm" style="width: 25rem;">
        <h2 class="card-title text-center mb-4 text-bold">Login</h2>
        <form @submit.prevent="login">
          <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" v-model="email" required class="form-control" id="email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" v-model="password" required class="form-control" id="password">
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
          <div v-if="error" class="mt-3 text-danger">{{ error }}</div>
        </form>
        <div class="text-center mt-3">
          <router-link to="/register" class="text-primary">Registrar-se</router-link>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from 'vue';
  import axiosInstance from '../../configs/axiosConfig';
  
  export default {
    setup() {
      const email = ref('');
      const password = ref('');
      const error = ref('');
  
      const login = async () => {
        try {
          const response = await axiosInstance.post('/login', {
            email: email.value,
            password: password.value
          });
  
          const token = response.data.token;
          localStorage.setItem('token', token);
  
          console.log('Login bem-sucedido');
          router.push({ name: 'home' });
  
        } catch (err) {
          error.value = 'Erro ao fazer login. Verifique suas credenciais.';
        }
      };
  
      return {
        email,
        password,
        error,
        login
      };
    }
  };
  </script>
  
  <style scoped>
  .card {
    border-radius: 10px;
  }
  
  .btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
  }
  </style>