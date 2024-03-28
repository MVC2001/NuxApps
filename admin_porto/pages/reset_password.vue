<template>
    <div class="flex h-screen bg-gray-100">
      <!-- Desktop Sidebar -->
      <aside class="hidden w-64 text-gray-100 bg-gray-800 lg:block">
        <div class="flex flex-col justify-between h-full">
          <!-- Sidebar content -->
          <nav class="py-5 p-7" style="margin-top: 90px;">
            <ul class="py-4">
              <li>
                <nuxt-link to="/dashboard" class="block px-6 py-2 shadow-md hover:bg-gray-700">AdminDashboard</nuxt-link>
              </li>
              <br>
              <li>
                <nuxt-link to="/reset_password" class="block px-6 py-2 hover:bg-gray-700">Reset-Password</nuxt-link>
              </li>
              <li>
                <nuxt-link to="/users/allusers" class="block px-6 py-2 hover:bg-gray-700">UsersAccount</nuxt-link>
              </li>
              <li>
                <nuxt-link to="/ambulance/allInfo" class="block px-6 py-2 hover:bg-gray-700">Ambulances</nuxt-link>
              </li>
              <li>
                <nuxt-link to="/orders" class="block px-6 py-2 hover:bg-gray-700">All-Orders</nuxt-link>
              </li>
              <li>
                <nuxt-link to="/orders/comfirmed" class="block px-6 py-2 hover:bg-gray-700">ConfirmedOrders</nuxt-link>
              </li>
            </ul>
          </nav>
          <!-- End of sidebar content -->
        </div>
      </aside>
  
      <!-- Mobile Sidebar -->
      <aside class="fixed top-0 left-0 z-50 w-64 h-screen text-gray-100 bg-gray-800" :class="{ 'block': isSidebarOpen, 'hidden': !isSidebarOpen }">
        <div class="flex flex-col justify-between h-full">
          <!-- Sidebar content -->
          <nav class="py-5 p-7" style="margin-top: 60px;">
            <ul class="py-4">
              <li>
                <nuxt-link to="" class="block px-6 py-2 hover:bg-gray-700">Reset-Password</nuxt-link>
              </li>
              <li>
                <nuxt-link to="" class="block px-6 py-2 hover:bg-gray-700">Your-Route</nuxt-link>
              </li>
            </ul>
          </nav>
          <!-- End of sidebar content -->
        </div>
      </aside>
  
      <!-- Main content -->
      <main class="flex-1">

        <!-- Top navigation -->
        <header class="flex items-center justify-between p-4 bg-white border-b border-gray-200">
          <div>
            <!-- Cancel button when sidebar is open -->
            <button v-if="isSidebarOpen" @click="toggleSidebar" class="block text-gray-600 lg:hidden hover:text-gray-800 focus:outline-none">
              <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
            <!-- Navigation button when sidebar is closed -->
            <button v-else @click="toggleSidebar" class="block text-gray-600 lg:hidden hover:text-gray-800 focus:outline-none">
              <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path :class="{ 'hidden': isSidebarOpen, 'block': !isSidebarOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                <path :class="{ 'hidden': !isSidebarOpen, 'block': isSidebarOpen }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
            <h1 class="text-xl font-bold">Reset-YourPassword</h1>
          </div>

        </header>
        <!-- End of top navigation -->

  
        <!-- Page content -->
        <div class="p-4">
          <!-- Your page content goes here -->
          <form @submit.prevent="handleSubmit">
            <!-- Your form content -->
            <div class="py-5 shadow-sm p-7" style="margin-top: 30px;background-color:white">
              <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3 mb-6 sm:w-1/2">
                  <label for="email" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Your Email</label>
                  <input type="text" id="email" v-model="email" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  <p v-if="!isEmailValid" class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid email address!</p>
                </div>
                <div class="w-full px-3 mb-6 sm:w-1/2">
                  <label for="oldPassword" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Your Old Password</label>
                  <input type="password" id="oldPassword" v-model="oldPassword" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  <p v-if="!isOldPasswordValid" class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid old password!</p>
                </div>
              </div>
              <div class="flex flex-wrap -mx-3">
                <div class="w-full">
                  <label for="newPassword" class="block mb-2 text-sm font-medium text-green-700 dark:text-red-500">Your New Password</label>
                  <input type="password" id="newPassword" v-model="newPassword" class="bg-green-50 border border-green-700 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400" placeholder="">
                  <p v-if="!isNewPasswordValid" class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Please!</span> Enter a new password</p>
                </div>
              </div>
              <div class="py-3">
                <button type="submit" class="flex justify-center h-10 p-5 px-5 py-3 mt-8 text-sm font-medium text-white transition duration-150 ease-in-out bg-teal-500 border border-transparent rounded-md w-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                  Reset Now
                </button>
              </div>
            </div>
          </form>
          <nuxt/>
        </div>

        <div v-if="showSuccessAlert" class="p-4 mb-4 text-center text-green-700 bg-green-100 border-l-4 border-green-500 rounded">
          <p class="font-bold text-center ">Password updated successfully</p>
        </div>
        <!-- End of page content -->
      </main> 
      <!-- End of main content -->
    </div>
  </template>
  
  
  
  
  <script setup>
import { ref } from 'vue';
import axios from 'axios'; 
import { useRouter } from 'vue-router'; 

const router = useRouter(); 
const isSidebarOpen = ref(false);
const showSuccessAlert = ref(false);

// Data properties for form inputs
const email = ref('');
const oldPassword = ref('');
const newPassword = ref('');

// Data properties for input validation
const isEmailValid = ref(true);
const isOldPasswordValid = ref(true);
const isNewPasswordValid = ref(true);

function toggleSidebar() {
  isSidebarOpen.value = !isSidebarOpen.value;
}

function resetPassword(email, oldPassword, newPassword) {
  const token = localStorage.getItem('token');
  if (!token) {
    console.error('Token not found in local storage');
    return;
  }

  axios.post('http://127.0.0.1:8000/api/update-passwordv7', {
    email: email,
    current_password: oldPassword,
    new_password: newPassword
  }, {
    headers: {
      'Authorization': `Bearer ${token}`
    }
  })
  .then(response => {
    console.log(response.data.message);
    // Show success alert
    showSuccessAlert.value = true;
  })
  .catch(error => {
    console.error('Password reset failed:', error);
  });
}

function handleSubmit() {
  // Validate form inputs
  isEmailValid.value = validateEmail(email.value);
  isOldPasswordValid.value = validatePassword(oldPassword.value);
  isNewPasswordValid.value = validatePassword(newPassword.value);

  // If all inputs are valid, proceed with password reset
  if (isEmailValid.value && isOldPasswordValid.value && isNewPasswordValid.value) {
    resetPassword(email.value, oldPassword.value, newPassword.value);
  }
}

// Simple email validation function
function validateEmail(email) {
  return /\S+@\S+\.\S+/.test(email);
}

// Simple password validation function
function validatePassword(password) {
  return password.length >= 8;
}
</script>

  
  <style scoped>
  /* Add your custom styles here */
  </style>