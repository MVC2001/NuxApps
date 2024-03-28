
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
                <NuxtLink to="/ambulance/ambulances" class="px-3 py-5 text-gray-700 hover:text-gray-900">Ambulances</NuxtLink>
                <NuxtLink to="/service" class="px-3 py-5 text-gray-700 hover:text-gray-900">Services</NuxtLink>
                <NuxtLink to="/contuct" class="px-3 py-5 text-gray-700 hover:text-gray-900">Contact Us</NuxtLink>
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
            <NuxtLink to="/service" class="block px-4 py-2 text-sm hover:bg-gray-200">Services</NuxtLink>
          <NuxtLink to="/ambulance" class="block px-4 py-2 text-sm hover:bg-gray-200">Ambulances</NuxtLink>
          <NuxtLink to="/contuct" class="block px-4 py-2 text-sm hover:bg-gray-200">Contact Us</NuxtLink>
        </div>
      </nav>

      <div>
        <slot/>
      </div>
</div>

</template>

<script setup>
import { ref } from "vue";

const isOpen = ref(false);
</script>