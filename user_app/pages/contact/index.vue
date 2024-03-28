<template>
    <div>
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
                    <NuxtLink to="/service" class="px-3 py-5 text-gray-700 hover:text-gray-900">Service</NuxtLink>
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
              <NuxtLink to="/service" class="block px-4 py-2 text-sm hover:bg-gray-200">Service</NuxtLink>
            </div>
          </nav>
          
          
          <div class="flex justify-between py-5" style="margin-top: 20px;">
            <!-- Left Column: col-sm-6 -->
            <div class="w-full sm:w-1/2">
              <!-- Card with shadow -->
              <div class="flex flex-col justify-between h-full p-4 bg-white rounded-lg shadow-md">
                <!-- Card header with teal background -->
                <div class="py-2 text-center rounded-t-lg text-teal bg-white-900">
                  <h2 class="text-xl font-bold">Send any query here</h2> 
                </div>
                <!-- Card body with teal background -->
                <div class="p-4 text-white rounded-b-lg bg-white-600">
                  <!-- Your content goes here -->
                  <p>Contact form goes here...</p>
                  <form>
                      <div class="mb-4">
                        <label for="name" class="block mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-600" placeholder="Your Name">
                      </div>
          
                      <div class="mb-4">
                        <label for="email" class="block mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-600" placeholder="Your Email">
                      </div>
          
                      <div class="mb-4">
                        <label for="message" class="block mb-2">Message</label>
                        <textarea id="message" name="message" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-teal-600" rows="4" placeholder="Your Message"></textarea>
                      </div>
          
                      <button type="submit" class="px-4 py-2 font-bold text-white bg-teal-600 rounded hover:bg-teal-700">Send</button>
                    </form>
                </div>
              </div>
            </div>
        
            <!-- Right Column: col-sm-6 -->
            <div class="w-full sm:w-1/2">
              <!-- Card with shadow -->
              <div class="flex flex-col justify-between h-full p-4 bg-white rounded-lg shadow-md">
                <!-- Card header with teal background -->
                <div class="py-2 text-center rounded-t-lg text-teal bg-white-600">
                  <h2 class="text-xl font-bold">Ambulance FixChap info</h2>
                  
                  <div class="flex items-center justify-center mt-4 space-x-4 sites" style="margin-top: 20px;">
                    <!-- Instagram Icon -->
                    <svg class="w-8 h-8 text-teal-600 fill-current" viewBox="0 0 24 24">
                      <path d="M12 2.71c3.17 0 3.55.012 4.81.07 1.14.051 1.94.234 2.63.499.75.287 1.32.673 1.91 1.24.57.657.953 1.19 1.24 1.91.265.69.448 1.49.499 2.63.058 1.26.07 1.64.07 4.81s-.012 3.55-.07 4.81c-.051 1.14-.234 1.94-.499 2.63-.287.75-.673 1.32-1.24 1.91-.57-.57-1.19-.953-1.91-1.24-.69-.265-1.49-.448-2.63-.499-1.26-.058-1.64-.07-4.81-.07s-3.55.012-4.81.07c-1.14.051-1.94.234-2.63.499-.75.287-1.32.673-1.91 1.24-.57.657-.953 1.19-1.24 1.91-.265.69-.448 1.49-.499 2.63-.058 1.26-.07 1.64-.07 4.81s.012 3.55.07 4.81c.051 1.14.234 1.94.499 2.63.287.75.673 1.32 1.24 1.91.57.57 1.19.953 1.91 1.24.69.265 1.49.448 2.63.499 1.26.058 1.64.07 4.81.07zm0-1.71C8.308 1 8 1.308 8 2.29v19.42c0 .981.308 1.29 3.999 1.29s4-.308 4-1.29V2.29C16 1.308 15.692 1 12 1zm0 4.02a3.98 3.98 0 00-4 3.98v7.973a3.98 3.98 0 004 3.98 3.98 3.98 0 004-3.98V8a3.98 3.98 0 00-4-3.98z"/>
                    </svg>
              
                    <!-- Facebook Icon -->
                    <svg class="w-8 h-8 text-teal-600 fill-current" viewBox="0 0 24 24">
                      <path d="M13 5V2h-3c-1.654 0-3 1.346-3 3v3H5v4h2v10h5v-9h3l1-4h-4V8c0-.288.175-.58.417-.818.245-.236.572-.453.983-.453h2V3.667C12 3.298 11.701 3 11.333 3H10V0H7v3H2v4h5v10h6V7h4l1-2z"/>
                    </svg>
              
                    <!-- Twitter Icon -->
                    <svg class="w-8 h-8 text-teal-600 fill-current" viewBox="0 0 24 24">
                      <path d="M22.46 6c-.84.37-1.73.62-2.68.73.96-.58 1.7-1.5 2.05-2.6-.9.53-1.89.9-2.95 1.1-.85-.9-2.06-1.46-3.4-1.46-2.57 0-4.65 2.08-4.65 4.65 0 .36.04.71.09 1.05-3.87-.19-7.3-2.05-9.6-4.87-.4.7-.63 1.52-.63 2.4 0 1.65.84 3.1 2.12 3.95-.78-.03-1.52-.24-2.17-.6v.06c0 2.3 1.63 4.22 3.78 4.65-.4.1-.82.16-1.25.16-.3 0-.6-.03-.9-.08.6 1.85 2.35 3.2 4.42 3.24-1.62 1.3-3.66 2.08-5.9 2.08-.38 0-.75-.02-1.12-.07 2.1 1.35 4.6 2.13 7.3 2.13 8.76 0 13.55-7.27 13.55-13.55 0-.2 0-.4-.02-.6.93-.67 1.73-1.51 2.37-2.47z"/>
                    </svg>
              
                    <!-- Telegram Icon -->
                    <svg class="w-8 h-8 text-teal-600 fill-current" viewBox="0 0 24 24">
                      <path d="M19.41 2.59c.39.39.39 1.02 0 1.41L17.83 6l1.59 1.59c.39.39.39 1.02 0 1.41l-7.59 7.59c-.39.39-1.02.39-1.41 0L6 12.83l-1.59 1.59c-.39.39-1.02.39-1.41 0l-2.79-2.79c-.39-.39-.39-1.02 0-1.41l14-14c.39-.39 1.02-.39 1.41 0zM14 7l-5 5 1.41 1.41L15 8.83l5 5L21 12V7h-7z"/>
                    </svg>
                    
                  </div>
                  <div class="py-5 par">
                    <p class="text-center text-teal-900" style="margin: 40px;">
                        What are most ambulances called for?<br>
                        Traumatic Injury (21.4%) ...<br>
                        Abdominal Pain (12.3%) ...<br>
                        Respiratory Distress (12.2%) ...<br>
                        Chest Pain (10.1%) ...<br>
                        Behavioral Disorder (7.8%) ...<br>
                        Loss of Consciousness (7.7%) ...<br>
                        Altered Level of Consciousness (6.9%) ...<br>
                        Seizure (4.7%)
                    </p>
                  </div>
                </div>
                <!-- Card body with teal background -->
                <div class="p-4 text-white bg-teal-600 rounded-b-lg">
                  <!-- Your content goes here -->
                  <p>Contact information goes here...</p>
                </div>
              </div>
            </div>
          </div>
          
    </div>
   
  </template>
  
  <script setup>
    // You can add script logic here if needed
    const isOpen = ref(false);
  </script>
  
  <style scoped>
    /* You can add scoped styles here */
  </style>
  