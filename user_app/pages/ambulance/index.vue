<template>
    <div>
      <!-- nav -->
      <nav class="bg-white shadow-md">
        <div class="max-w-6xl px-4 mx-auto">
          <div class="flex justify-between">
            <div class="flex space-x-4">
              <!-- logo -->
              <div>
                <a href="#" class="flex items-center px-2 py-5 text-gray-700 hover:text-gray-900">
                  <span class="font-bold text-teal-500 shadow-sm">Ambulance-FixChap</span>
                </a>
              </div>
              <!-- primary nav -->
              <div class="items-center hidden space-x-1 md:flex">
                <NuxtLink to="/" class="px-3 py-5 text-gray-700 hover:text-gray-900">Home</NuxtLink>
                <NuxtLink to="/service" class="px-3 py-5 text-gray-700 hover:text-gray-900">Services</NuxtLink>
                <NuxtLink to="/contact" class="px-3 py-5 text-gray-700 hover:text-gray-900">Contact Us</NuxtLink>
              </div>
            </div>
            <!-- secondary nav -->
            <div class="items-center hidden space-x-1 md:flex">
              <NuxtLink to="/auth/login" class="px-3 py-2 text-white transition duration-300 bg-teal-500 rounded hover:bg-blue-600">Sign In</NuxtLink>
            </div>
            <!-- mobile button goes here -->
            <div class="flex items-center md:hidden">
              <button @click="isOpen = !isOpen" class="md:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                  stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <!-- mobile menu -->
        <div class="md:hidden" :class="isOpen ? 'block' : 'hidden'">
          <NuxtLink to="/" class="block px-4 py-2 text-sm hover:bg-gray-200">Home</NuxtLink>
          <NuxtLink to="/service" class="block px-4 py-2 text-sm hover:bg-gray-200">Services</NuxtLink>
          <NuxtLink to="/contact" class="block px-4 py-2 text-sm hover:bg-gray-200">Contact Us</NuxtLink>
        </div>
      </nav>
  
      <!-- Search form -->
      <div class="flex w-full bg-teal-500 shadow-sm main p-7">
        <div class="w-full p-5 search form">
          <form class="max-w-md mx-auto" @submit.prevent="searchAmbulances">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
              <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
              </div>
              <input v-model="searchQuery" type="search" id="default-search" class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="eg. Goba or Mbezi, Or Mwenge...ect" required />
              <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-teal-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
          </form>
        </div>
      </div>
  
      <!-- Ambulance cards -->
      <div class="flex flex-wrap justify-center py-5 px-7">
        <template v-if="loading">
          <!-- Loading spinner -->
          <div class="flex items-center justify-center h-screen">
            <svg class="w-10 h-10 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647zM20 12a8 8 0 01-8 8v-4c2.206 0 4-1.794 4-4h4zm-2-5.291A7.962 7.962 0 0120 12h4c0-3.042-1.135-5.824-3-7.938l-3 2.647z"></path>
            </svg>
          </div>
        </template>
  
        
        <template v-else-if="ambulances.length === 0">
          <!-- No ambulances found -->
          <div class="flex items-center justify-center h-screen">
            <p class="text-2xl text-gray-500">No any ambulance found.</p>
          </div>
        </template>
        
        <template v-else>
          <!-- Display ambulances -->
          <div v-for="ambulance in ambulances" :key="ambulance.id" class="max-w-sm mx-3 my-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img :src="getImageUrl(ambulance.image)" class="p-8 rounded-t-lg"  alt="product image"  style="height: 250px;width:360px;">
            <div class="p-2 px-5 shadow-sm">
              <p  class="text-xl font-semibold tracking-tight text-center text-teal-600 dark:text-white">
                {{ ambulance.category }} 
              </p>
              <hr>
              <p  class="text-xl font-semibold tracking-tight text-left text-yellow-600 dark:text-white">
                Brand: {{ ambulance.brand }} 
              </p>
              <p  class="text-xl font-semibold tracking-tight text-left text-dark-400 dark:text-white">
                Number: {{ ambulance.amblnc_number }}
              </p>
              <div class="flex items-center mt-2.5 mb-5">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                  <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                  </svg>
                  <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                  </svg>
                  <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                  </svg>
                  Route
                </div>
                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">{{ ambulance.route }}</span>
              </div>
              <div class="flex items-center justify-between">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ ambulance.price }}</span>
                <NuxtLink :to="`/ambulance/${ambulance.id}`" class="text-white bg-teal-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Request</NuxtLink>
            </div>
          </div>
          </div>

        </template>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import axios from 'axios';
  
  const ambulances = ref([]);
  const loading = ref(true);
  const isOpen = ref(false);
  const searchQuery = ref('');
  
  

  
  const fetchAmbulances = async () => {
    try {
      const response = await axios.get('http://127.0.0.1:8000/api/ambulances');
      ambulances.value = response.data;
    } catch (error) {
      console.error('Error fetching ambulances:', error);
    } finally {
      loading.value = false;
    }
  };
  
  const getImageUrl = (image) => {
    return `http://127.0.0.1:8000/images/${image}`;
  };
  
  
  
  const searchAmbulances = async () => {
    loading.value = true;
    try {
      const response = await axios.get(`http://127.0.0.1:8000/api/ambulancesByroute?search=${searchQuery.value}`);
      ambulances.value = response.data;
    } catch (error) {
      console.error('Error searching ambulances:', error);
    } finally {
      loading.value = false;
    }
  };
  
  fetchAmbulances();
  </script>
  
  <style scoped>
  body {
    box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
  }
  </style>