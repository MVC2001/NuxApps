<template>
    <div class="bg-teal-500">
    <div class="flex items-center justify-center h-screen">
      <div class="bg-white rounded-lg shadow-lg w-96">
        <!-- Card Header with SVG Icon -->
        <div class="flex items-center justify-between px-4 py-3 rounded-t-lg text-teal bg-whte-200">
          <div>
            <h2 class="text-lg font-bold">Request Successfull!!!</h2>
          </div>
          <div>
            <!-- SVG Icon for Congratulations -->
            <svg class="w-20 h-10 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
        </div>
        <!-- Card Body with Background Color -->
        <div class="p-4 bg-teal-400">
          <p class="text-teal-700">Your successful request for an ambulance is waiting for a response. or call 0682131140</p>
          <!-- NuxtLink Button -->
          <div class="flex justify-center mt-4">
            <nuxt-link to="/ambulance" class="px-4 py-2 text-white transition-colors duration-300 bg-teal-500 rounded-md hover:bg-teal-600">Go Back</nuxt-link>
          </div>
        </div>
      </div>
    </div>

</div>
  </template>
  
  <script setup>
  </script>
  
  <style scoped>
  </style>
  