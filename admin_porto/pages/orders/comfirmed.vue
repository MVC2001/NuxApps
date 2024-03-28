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
            <h1 class="text-xl font-bold">All Orders</h1>
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
                        </div>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3">AmblncNo#</th>
                                    <th scope="col" class="px-4 py-3">Route</th>
                                    <th scope="col" class="px-4 py-3">Client</th>
                                    <th scope="col" class="px-4 py-3">AccountNo</th>
                                    <th scope="col" class="px-4 py-3">Amount</th>
                                    <th scope="col" class="px-4 py-3">Status</th>
                                    <th scope="col" class="px-4 py-3">OrderedAt</th>
                                    <th scope="col" class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="order in orders" :key="order.id" class="border-b dark:border-gray-700">
                                    <td class="px-4 py-3">{{ order.amblnc_number }}</td>
                                    <td class="px-4 py-3">{{ order.route}}</td>
                                    <td class="px-4 py-3">{{ order.clientName }}</td>
                                    <td class="px-4 py-3">{{ order.accountNo }}</td>
                                    <td class="px-4 py-3">{{ order.amount }}</td>
                                    <td  class="py-4 text-white bg-green-500 rounded-md py-px-3 hover:bg-green-600"><button>{{ order.confirm }}</button></td>
                                    <td class="px-4 py-3">{{ order.created_at }}</td>
                                    <td class="flex items-center justify-end px-4 py-3">
                                      <!-- Action buttons -->
                                      <button type="button" @click="deleteOrder(order.id)" class="px-3 py-1 ml-2 text-white bg-red-500 rounded-md hover:bg-red-600">Delete</button>
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
import { ref, onMounted } from 'vue';
import axios from 'axios';
const orders = ref([]);



async function fetchOrders() {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/confirmed-orders');
    // Assuming the response data structure has an 'orders' property
    orders.value = response.data;
  } catch (error) {
    console.error('Error fetching orders:', error);
  }
}



async function deleteOrder(orderId) {
  try {
    const response = await axios.delete(`http://127.0.0.1:8000/api/clientsOrders/${orderId}`);
    console.log(response.data.message); // Log success message
    // Remove the deleted order from the orders array
    orders.value = orders.value.filter(order => order.id !== orderId);
  } catch (error) {
    console.error('Error deleting order:', error);
  }
}

onMounted(fetchOrders);
</script>

<style>
/* Your styles */
</style>