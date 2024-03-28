<template>
    
    <div class="container">
        <nav class="bg-white shadow-md">
            <div class="max-w-6xl px-4 mx-auto">
              <div class="flex justify-between">
                <div class="flex space-x-4">
                  <!-- logo -->
                  <div>
                    <a href="/" class="flex items-center px-2 py-5 text-gray-700 hover:text-gray-900">
                        <span class="font-bold text-teal-500 shadow-sm">Ambulance-FixChap</span>
                    </a>
                  </div>
                  <!-- primary nav -->
                  <div class="items-center hidden space-x-1 md:flex">
                    <NuxtLink to="/ambulance" class="px-3 py-5 text-gray-700 hover:text-gray-900">Ambulances</NuxtLink>
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
              <NuxtLink to="/ambulance" class="block px-4 py-2 text-sm hover:bg-gray-200">Ambulances</NuxtLink>
              <NuxtLink to="/contact" class="block px-4 py-2 text-sm hover:bg-gray-200">Contact Us</NuxtLink>
            </div>
          </nav>
          

          <div class="service-container">
            <div class="service-card">
              <div class="service-header bg-white-600">
                <h1 class="text-center service-title">Ambulance Service</h1>
              </div>
              <div class="bg-teal-600 service-body">
                <div class="service-description">
                  <p>Our ambulance service is committed to providing prompt and reliable emergency medical transportation.</p>
                  <p>Features of our ambulance service:</p>
                  <ul>
                    <li>24/7 availability</li>
                    <li>Experienced paramedics and medical staff</li>
                    <li>Modern ambulances equipped with advanced medical equipment</li>
                    <li>Rapid response to emergency calls</li>
                    <li>Safe and efficient transportation to medical facilities</li>
                  </ul>
                  <p>Contact us today for emergency medical transportation services you can rely on.</p>
                </div>
              </div>
              <footer class="service-footer">
                <nuxt-link to="/" class="bg-teal-700 btn">Go Back</nuxt-link>
              </footer>
            </div>
          </div>
    </div>
  
  </template>
  
  <script setup>
   const isOpen = ref(false);
  </script>
  
  <style scoped>
    .service-container {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
  
    .service-card {
      width: 100%;
      max-width: 600px; /* Adjust as needed */
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  
    .service-header {
      padding: 20px;
    }
  
    .service-body {
      padding: 20px;
    }
  
    .service-footer {
      text-align: center;
      padding: 20px;
    }
  
    .service-title {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }
  
    .service-description {
      font-size: 16px;
      line-height: 1.6;
      color: #fff;
    }
  
    .service-description ul {
      margin-left: 20px;
    }
  
    .service-description li {
      margin-bottom: 5px;
    }
  
    .btn {
      padding: 10px 20px;
      color: #fff;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      cursor: pointer;
    }
  
    .btn:hover {
      opacity: 0.9;
    }
  </style>
  