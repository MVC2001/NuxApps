
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
              <nuxt-link to="/" class="block px-6 py-2 hover:bg-gray-700">All-Requests</nuxt-link>
            </li>
            <li>
              <nuxt-link to="/" class="block px-6 py-2 hover:bg-gray-700">Confirmed-Orders</nuxt-link>
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
          <h1 class="text-xl font-bold">Create new amblnc info here</h1>
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
                <label for="category" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Category</label>
                <input type="text" id="category" v-model="form.category"  class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                <p  class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid category</p>
              </div>
              
              <div class="w-full px-3 mb-6 sm:w-1/2">
                  <label for="brand" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Brand</label>
                  <input type="text" id="brand" v-model="form.brand" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  <p  class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid brand!</p>
                </div>
                
            </div>
            <div class="flex flex-wrap -mx-3">
              
              <div class="w-full px-3 mb-6 sm:w-1/2">
                  <label for="amblnc_number" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Ambulance Number</label>
                  <input type="text" id="amblnc_number" v-model="form.amblnc_number" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid ambl number!</p>
                </div>
                
              <div class="w-full px-3 mb-6 sm:w-1/2">
                <label for="route" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Route</label>
                <input type="text" id="route" v-model="form.route"  class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid route</p>
              </div>
            </div>
            

            <div class="flex flex-wrap -mx-3">
              
              <div class="w-full px-3 mb-6 sm:w-1/2">
                  <label for="price" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Transport Price</label>
                  <input type="text" id="price" v-model="form.price" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid price in $3525!</p>
                </div>
                
              <div class="w-full px-3 mb-6 sm:w-1/2">
                <label for="license" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Ambulance Photo</label>
                <input type="file" id="image" @change="handleFileChange" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid and quality img for ambulance</p>
              </div>
            </div>
            

        
            <div class="py-3">
              <button type="submit" class="flex justify-center h-10 p-5 px-4 py-3 text-sm font-medium text-white transition duration-150 ease-in-out bg-teal-500 border border-transparent rounded-md w-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                Add now
              </button>
            </div>
          </div>
        </form>
        <nuxt/>
      </div>

     
    </main> 
    <!-- End of main content -->
  </div>
</template>



<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router'; // Import useRouter from Vue Router

const router = useRouter(); // Access the router object

const form = ref({
  category: '',
  brand: '',
  amblnc_number: '',
  route: '',
  price: '',
  image: null
});

const handleSubmit = async () => {
  try {
    const formData = new FormData();
    formData.append('category', form.value.category);
    formData.append('brand', form.value.brand);
    formData.append('amblnc_number', form.value.amblnc_number);
    formData.append('route', form.value.route);
    formData.append('price', form.value.price);
    formData.append('image', form.value.image);

    const response = await axios.post('http://127.0.0.1:8000/api/ambulances', formData);
    console.log('Ambulance added:', response.data);
    
    // Navigate to allInfo page after successful addition
    router.push('/ambulance/allInfo');
    
    clearForm();
  } catch (error) {
    console.error('Error adding ambulance:', error);
  }
};

const handleFileChange = (event) => {
  form.value.image = event.target.files[0];
};

const clearForm = () => {
  // Clear form fields
  form.value.category = '';
  form.value.brand = '';
  form.value.amblnc_number = '';
  form.value.route = '';
  form.value.price = '';
  form.value.image = null;
};
</script>