<template>
    <div>
    <!-------------nav-->
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
            <NuxtLink to="/service" class="block px-4 py-2 text-sm hover:bg-gray-200">Services</NuxtLink>
          <NuxtLink to="/ambulance" class="block px-4 py-2 text-sm hover:bg-gray-200">Ambulances</NuxtLink>
          <NuxtLink to="/contact" class="block px-4 py-2 text-sm hover:bg-gray-200">Contact Us</NuxtLink>
        </div>
      </nav>

      <div class="flex w-full h-auto bg-teal-500 shadow-sm main p-7">
      </div>

     
      <div class="flex flex-wrap" style="margin-top: 150px;margin-left:120px">
        <div class="w-full px-3 mb-6 sm:w-1/2">
<a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </a>
        </div>
        <div class="w-full px-3 mb-6 sm:w-1/2">
<a href="#" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
    </a>    
        </div>
      </div>

      <div class="w-full h-12 text-center py-7 p-7 text-bg-teal-900" style="margin-top: 10px;box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;;">
        ONLINE AMBULANCE DERIVERY APPLICATION
      </div>
      <div class="text-center">
        <p style="color:teal">Developer:Mudhihir Nyema, MvcSofts. 0682131140</p>
      </div>
    </div>
</template>



<script setup>
import { ref } from "vue";

const isOpen = ref(false);
</script>

<style scoped>

</style>