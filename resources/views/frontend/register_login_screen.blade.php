<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Beauty Registration</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f8f2fc;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      background: #f3dcfb;
      border-radius: 20px;
      display: flex;
      padding: 40px;
      gap: 40px;
      max-width: 1100px;
      width: 90%;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    .form-section { flex: 1; }
    .image-section {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .image-section img {
      max-width: 100%;
      border-radius: 20px;
    }
    h2 { color: #5a0c88; font-size: 28px; font-weight: 700; }
    p { margin: 8px 0 20px; font-size: 14px; color: #6a518e; }
    .tabs {
      display: flex; gap: 10px; margin-bottom: 20px;
    }
    .tabs button {
      flex: 1;
      padding: 10px 0;
      border: 2px solid #9b59b6;
      background: none;
      font-weight: 600;
      border-radius: 8px;
      color: #9b59b6;
      cursor: pointer;
      transition: all 0.2s ease;
    }
    .tabs .active {
      background-color: #6b0f9c;
      color: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    form { margin-top: 10px; }
    .row {
      display: flex;
      gap: 20px;
      margin-bottom: 15px;
    }
    .input-group {
      flex: 1;
      display: flex;
      flex-direction: column;
    }
    .input-group label {
      font-size: 13px;
      color: #5a0c88;
      margin-bottom: 5px;
    }
    .input-group input {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      font-size: 14px;
    }
    .signup-btn {
      width: 100%;
      padding: 12px;
      background-color: #6b0f9c;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 15px;
      margin-top: 10px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .signup-btn:hover { background-color: #520c7c; }
    .login-link {
      text-align: center;
      font-size: 13px;
      margin-top: 10px;
    }
    .login-link a {
      color: #6b0f9c;
      font-weight: 600;
      text-decoration: none;
    }
    @media screen and (max-width: 768px) {
      .container { flex-direction: column; padding: 20px; }
      .image-section { display: none; }
    }
  </style>
</head>

<body>
<div id="app" class="container">
  <div class="form-section">
    <h2>@{{ isLogin ? 'Login your account' : 'Registration' }}</h2>
    <p>@{{ isLogin ? 'Welcome back to beauty world' : 'Create your beauty account' }}</p>

    <div class="tabs">
      <button :class="{ active: !isLogin }" @click="isLogin = false">Register</button>
      <button :class="{ active: isLogin }" @click="isLogin = true">Login</button>
    </div>

    <form @submit.prevent="handleSubmit">
      <!-- Register form -->
      <div v-if="!isLogin">
        <div class="row">
          <div class="input-group">
            <label>First Name*</label>
            <input v-model="registerForm.first_name" required>
          </div>
          <div class="input-group">
            <label>Last Name*</label>
            <input v-model="registerForm.last_name" required>
          </div>
        </div>
        <div class="row">
          <div class="input-group">
            <label>Username*</label>
            <input v-model="registerForm.name" required>
          </div>
          <div class="input-group">
            <label>Email*</label>
            <input type="email" v-model="registerForm.email" required>
          </div>
        </div>
        <div class="row">
          <div class="input-group">
            <label>Password*</label>
            <input type="password" v-model="registerForm.password" required>
          </div>
          <div class="input-group">
            <label>Confirm Password*</label>
            <input type="password" v-model="registerForm.password_confirmation" required>
          </div>
        </div>
        <div class="input-group">
          <label>
            <input type="checkbox" v-model="registerForm.terms_and_conditions">
            Accept terms & conditions
          </label>
        </div>
      </div>

      <!-- Login form -->
      <div v-else>
        <div class="input-group">
          <label>Email*</label>
          <input type="email" v-model="loginForm.email" required>
        </div>
        <div class="input-group">
          <label>Password*</label>
          <input type="password" v-model="loginForm.password" required>
        </div>
      </div>

      <button type="submit" class="signup-btn">@{{ isLogin ? 'Login' : 'Sign up' }}</button>
    </form>

    <p class="login-link">
      @{{ isLogin ? `Don't have an account?` : `Already have an account?` }}
      <a href="#" @click.prevent="isLogin = !isLogin">@{{ isLogin ? 'Sign up' : 'Login' }}</a>
    </p>

    <div v-if="message" :style="{ color: messageColor, marginTop: '10px' }">
      @{{ message }}
    </div>
  </div>

  <div class="image-section">
    <img src="{{asset('frontend/assets/img/beauty-image.png')}}" alt="Beauty Products" />
  </div>
</div>

<script>
const { createApp } = Vue

createApp({
  data() {
    return {
      isLogin: false,
      message: '',
      messageColor: 'green',
      registerForm: {
        first_name: '',
        last_name: '',
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        role_id: 2,
        terms_and_conditions: false
      },
      loginForm: {
        email: '',
        password: ''
      }
    }
  },
  methods: {
    handleSubmit() {
      if (!this.isLogin) {
        // Registration
        if (!this.registerForm.terms_and_conditions) {
          this.message = "You must accept the terms & conditions.";
          this.messageColor = "red";
          return;
        }
        axios.post('/api/auth/register', this.registerForm)
          .then(res => {
            this.message = "Registration successful!";
            this.messageColor = "green";
            console.log(res.data);
                localStorage.setItem('user', JSON.stringify(res.data.user));
                console.log("aaaaaaaaaaaaaaaaaaaaaaaaaa" ,localStorage.setItem('user', JSON.stringify(res.data.user)))
            window.location.href ="/"

          })
          .catch(err => {
            this.message = err.response?.data?.message || "Registration failed.";
            this.messageColor = "red";
          });
      } else {
        // Login
        axios.post('/api/auth/login', this.loginForm)
          .then(res => {
            this.message = "Login successful!";
            this.messageColor = "green";
            console.log(res.data);
            window.location.href ="/"
          })
          .catch(err => {
            this.message = err.response?.data?.message || "Login failed.";
            this.messageColor = "red";
          });
      }
    }
  }
}).mount('#app')
</script>
</body>
</html>
