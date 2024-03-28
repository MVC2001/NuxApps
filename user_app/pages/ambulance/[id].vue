<template>
  <div>
   <div class="flex h-screen bg-gray-100" style="height: 1300px;">
     <!-- Desktop Sidebar -->
     <aside class="hidden w-64 text-gray-100 bg-gray-800 lg:block">
       <!-- Sidebar content -->
       <nav class="py-5 p-7" style="margin-top: 90px;">
         <ul class="py-4">
           <li>
             <nuxt-link to="#" class="block px-6 py-2 shadow-md hover:bg-gray-700">User-Dashboard</nuxt-link>
           </li>
           <br>
         </ul>
       </nav>
       <!-- End of sidebar content -->
     </aside>
 
     <!-- Mobile Sidebar -->
     <aside class="fixed top-0 left-0 z-50 w-64 h-screen text-gray-100 bg-gray-800" :class="{ 'block': isSidebarOpen, 'hidden': !isSidebarOpen }">
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
           <h1 class="text-xl font-bold text-bg-teal-900">Now you can request here</h1>
         </div>
         <!-- Logout button -->
         <NuxtLink to="/ambulance" class="px-4 py-2 text-white bg-teal-500 rounded hover:bg-red-600">Back home</NuxtLink>
       </header>
       <!-- End of top navigation -->
 
       <!-- Page content -->
       <div class="p-4">
         <!-- Check if user is logged in and authenticated -->
         <div >
           <!-- Your page content goes here -->
           <div class="py-5 shadow-lg">
            <form @submit.prevent="postFunction">
              <!-- Your form content -->
              <div class="py-5 shadow-sm p-7" style="margin-top: 30px;background-color:white">

                <p  class="mt-2 text-sm text-center text-green-600 dark:text-green-500"><span class="font-medium">These field!</span> already filled!</p>
                
                <div class="flex flex-wrap py-5 -mx-3">
                  
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="amblnc_number" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Ambulance Number</label>
                    <input type="text" id="number" v-model="ambulance.amblnc_number" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  </div>
                  
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                      <label for="brand" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Brand</label>
                      <input type="text" id="brand" v-model="ambulance.brand" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    </div>
                    
                </div>
                <div class="flex flex-wrap -mx-3">
              
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                      <label for="route" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Route</label>
                      <input type="text" id="route" v-model="ambulance.route" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    </div>
                    
                    <div class="w-full px-3 mb-6 sm:w-1/2">
                      <label for="price" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Transport fee(price) $</label>
                      <input type="text" id="price" v-model="ambulance.price" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    </div>
                
                </div>
                

                <p  class="py-5 mt-2 text-sm text-center text-red-600 dark:text-green-500"><span class="font-medium" style="font-size: large;">Please fill these address fields below!</span></p><hr>
  
                <div class="flex flex-wrap py-5 -mx-3">
                  
                     
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="clientName" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">FullName</label>
                    <input type="text" id="clientName" required v-model="ambulance.clientName" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid fullName!</p>
                  </div>
               
                      
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                      <label for="address" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Physical Address</label>
                      <input type="text" id="address" required v-model="ambulance.address" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                      <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid address/location!</p>
                    </div>
                </div>
                

                <div class="flex flex-wrap -mx-3">
                   
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                      <label for="phone" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Contact Number</label>
                      <input type="text" id="phone" required v-model="ambulance.phone" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                      <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid phone number!</p>
                    </div>
                </div>



                <p  class="py-5 mt-2 text-sm text-center text-red-600 dark:text-green-500"><span class="font-medium" style="font-size: large;">Please fill these payment fields below!</span></p><hr>
                <div class="flex flex-wrap py-5 -mx-3">
                  
                 
                  <div class="w-full px-3 mb-4 sm:w-1/2">
                      <label for="accountNo" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Account number</label>
                      <input type="text" id="accountNo" required  v-model="ambulance.accountNo" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                      <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid account number!</p>
                    </div>

                    <div class="w-full px-3 mb-4 sm:w-1/2">
                      <label for="payMethod" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Payment Method</label>
                      <select id="payMethod" required v-model="ambulance.payMethod" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400">
                          <option value="airtel-money">Artel-money</option>
                          <option value="tigo-pesa">Tigo-pesa</option>
                          <option value="m-pesa">M-pesa</option>
                          <option value="halo-pesa">Halo-pesa</option>
                          <option value="CRDB">CRDB</option>
                          <option value="NMB">NMB</option>
                          <option value="NBC">NBC</option>
                          <option value="others">Others</option>
                      </select>
                      <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Select a your payment method</p>
                  </div>  

                    <div class="w-full px-3 mb-4 sm:w-1/2">
                      <label for="amount" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Amount payed</label>
                      <input type="text" id="amount" required v-model="ambulance.amount" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                      <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid total amount payed!</p>
                    </div>
                    
                </div>

              
                
                <div class="py-3">
                  <button type="submit" class="flex justify-center h-10 p-5 px-4 py-3 text-sm font-medium text-white transition duration-150 ease-in-out bg-teal-500 border border-transparent rounded-md w-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                    Request here
                  </button>
                </div>
              </div>
            </form>
           </div>
           <nuxt/>
         </div>
         <!-- If user is not logged in, display alert message -->
         
       </div>
       <!-- End of page content -->
     </main>
     <!-- End of main content -->
   </div>
   </div>
  
 </template>


<script>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default {
  name: 'request panel',
  setup() {
    const requestId = ref('');
    const ambulance = ref({});
    const isSidebarOpen = ref(false);
    const router = useRouter(); // Access the router object
    
    function toggleSidebar() {
      isSidebarOpen.value = !isSidebarOpen.value;
    }

    const getAmblById = async (requestId) => {
      try {
        const res = await axios.get(`http://127.0.0.1:8000/api/ambulances/${requestId}`);
        ambulance.value = res.data;
      } catch (error) {
        console.error('Error fetching ambulanceById:', error);
      }
    };
    
    const getImageUrl = (image) => {
      return `http://127.0.0.1:8000/images/${image}`;
    };

    const postFunction = async () => {
      try {
        const response = await axios.post('http://127.0.0.1:8000/api/clientsOrders', ambulance.value);
        console.log('Data posted successfully:', response.data);
        // Optionally, you can redirect the user to a success page after posting data
        router.push('/ambulance/successMessage');
      } catch (error) {
        console.error('Error posting data:', error);
      }
    };

    return { requestId, ambulance, isSidebarOpen, toggleSidebar, getAmblById, postFunction };
  },
  async created() {
    this.requestId = this.$route.params.id;
    await this.getAmblById(this.requestId);
  }
};
</script>


<style scoped>

</style>