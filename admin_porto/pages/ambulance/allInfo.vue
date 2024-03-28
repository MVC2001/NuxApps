<template>
  <div class="flex h-screen bg-gray-100">
    <!-- Desktop Sidebar -->
    <aside class="hidden w-64 text-gray-100 bg-gray-800 lg:block" style="height:700px">
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
                <nuxt-link to="/orders" class="block px-6 py-2 hover:bg-gray-700">All-Orders</nuxt-link>
              </li>
              <li>
                <nuxt-link to="/orders" class="block px-6 py-2 hover:bg-gray-700">ConfirmedOrders</nuxt-link>
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
          <h1 class="text-xl font-bold">All Ambulances</h1>
        </div>

      </header>
      <!-- End of top navigation -->


      <!-- Page content -->
      <div class="p-4">
        <!-- Your table content goes here -->
        <section class="p-3 bg-gray-50 dark:bg-gray-900 sm:p-5">
          <div class="max-w-screen-xl px-4 mx-auto lg:px-12">
              <!-- Start coding here -->
              <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                  <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
                      <div class="w-full md:w-1/2">
                          <form class="flex items-center">
                              <label for="simple-search" class="sr-only">Search</label>
                              <div class="relative w-full">
                                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                      </svg>
                                  </div>
                                  <input type="text" id="simple-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search">
                              </div>
                          </form>
                      </div>
                      
                      <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">
                          <button  class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800" style="background-color:teal">
                              <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                  <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                              </svg>
                              <NuxtLink to="/ambulance/createInfo">Add ambl info</NuxtLink> 
                          </button>
                      </div>
                  </div>
                  
                  <div class="overflow-x-auto">
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                              <tr>
                                  <th scope="col" class="px-4 py-3">Category</th>
                                  <th scope="col" class="px-4 py-3">Brand</th>
                                  <th scope="col" class="px-4 py-3">Number</th>
                                  <th scope="col" class="px-4 py-3">Route</th>
                                  <th scope="col" class="px-4 py-3">Price</th>
                                  <th scope="col" class="px-4 py-3">Image</th>
                                  <th scope="col" class="px-4 py-3">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr v-for="ambulance in ambulances" :key="ambulance.id" class="border-b dark:border-gray-700">
                                  <td class="px-4 py-3">{{ ambulance.category }}</td>
                                  <td class="px-4 py-3">{{ ambulance.brand }}</td>
                                  <td class="px-4 py-3">{{ ambulance.amblnc_number }}</td>
                                  <td class="px-4 py-3">{{ ambulance.route }}</td>
                                  <td class="px-4 py-3">{{ ambulance.price }}</td>
                                  <td class="px-4 py-3"><img :src="getImageUrl(ambulance.image)" alt="Ambulance Image" style="max-width: 100px; max-height: 100px;" /></td>
                                  <td class="flex items-center justify-end px-4 py-3">
                                    <!-- Action buttons -->
                                    <NuxtLink :to="`/ambulance/${ambulance.id}`" class="px-3 py-1 text-white bg-green-500 rounded-md hover:bg-green-600">Edit</NuxtLink>
                                    <button type="button" @click="deleteAmbulance(ambulance.id)" class="px-3 py-1 ml-2 text-white bg-red-500 rounded-md hover:bg-red-600">Delete</button>
                                  </td>
                                </tr>
                              
                          </tbody>
                      </table>
                  </div>
                  <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0" aria-label="Table navigation">
                      <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                          Showing
                          <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                          of
                          <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                      </span>
                      <ul class="inline-flex items-stretch -space-x-px">
                          <li>
                              <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <span class="sr-only">Previous</span>
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                  </svg>
                              </a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                          </li>
                          <li>
                              <a href="#" aria-current="page" class="z-10 flex items-center justify-center px-3 py-2 text-sm leading-tight border text-primary-600 bg-primary-50 border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center px-3 py-2 text-sm leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <span class="sr-only">Next</span>
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                  </svg>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
          </section>
        <nuxt/>
      </div>

     
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
  const ambulances = ref([]);
  

  const fetchAmbulances = async () => {
    try {
      const response = await axios.get('http://127.0.0.1:8000/api/ambulances');
      ambulances.value = response.data;
    } catch (error) {
      console.error('Error fetching ambulances:', error);
    }
  };

  
  const deleteAmbulance = async (id) => {
    try {
      await axios.delete(`http://127.0.0.1:8000/api/ambulances/${id}`);
      await fetchAmbulances();
    } catch (error) {
      console.error('Error deleting ambulance:', error);
    }
  };
  
 
  const getImageUrl = (image) => {
    return `http://127.0.0.1:8000/images/${image}`;
  };
  
  fetchAmbulances();


  function toggleSidebar() {
  isSidebarOpen.value = !isSidebarOpen.value;
}
  </script>
  