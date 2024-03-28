<template>
    <div class="flex h-screen bg-gray-100">
      <!-- Desktop Sidebar -->
      <aside class="hidden w-64 text-gray-100 bg-gray-800 lg:block" style="height: 900px;">
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
                <nuxt-link to="/" class="block px-6 py-2 hover:bg-gray-700">Ambulances</nuxt-link>
              </li>
              <li>
                <nuxt-link to="/" class="block px-6 py-2 hover:bg-gray-700">All-Requests</nuxt-link>
              </li>
              <li>
                <nuxt-link to="//orders/comfirmed" class="block px-6 py-2 hover:bg-gray-700">Confirmed-Orders</nuxt-link>
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
            <h1 class="text-xl font-bold">Update user here</h1>
          </div>

        </header>
        <!-- End of top navigation -->

  
        <!-- Page content -->
        <div class="p-4">
          <!-- Your page content goes here -->
          <form @submit.prevent="updateUser">
            <!-- Your form content -->
            <div class="py-5 shadow-sm p-7" style="margin-top: 30px;background-color:white">
              <div class="flex flex-wrap -mx-3">
                
                <div class="w-full px-3 mb-6 sm:w-1/2">
                  <label for="name" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">FullName</label>
                  <input type="text" id="name" v-model="user.name" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  <p  class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid name</p>
                </div>
                
                <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="email" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Email</label>
                    <input type="text" id="email" v-model="user.email" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    <p  class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid email address!</p>
                  </div>
                  
              </div>
              <div class="flex flex-wrap -mx-3">
            
                <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="nida" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500"> NIDA</label>
                    <input type="text" id="nida" v-model="user.nida" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid nida number</p>
                  </div>
                  
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="tin" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">TIN Number</label>
                    <input type="text" id="tin" v-model="user.tin" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid tin number!</p>
                  </div>
              
              </div>
              

              <div class="flex flex-wrap -mx-3">
                
                <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="license" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Driver license</label>
                    <input type="text" id="license" v-model="user.license" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid license number</p>
                  </div>
                  
                  <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="address" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500"> Adress</label>
                    <input type="text" id="address" v-model="user.address" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid address location!</p>
                  </div>
                  
              </div>
              

              <div class="flex flex-wrap -mx-3">
                
                <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="gender" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Gender</label>
                    <select id="gender" v-model="user.gender" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400">
                        <option value="">None</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Select a gender</p>
                </div>  
             
                    
                <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="phone" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Contact Number</label>
                    <input type="text" id="phone" v-model="user.phone" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid phone number!</p>
                  </div>
              </div>
              
              <div class="flex flex-wrap -mx-3">
            
                <div class="w-full px-3 mb-6 sm:w-1/2">
                  <label for="route" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Driver route</label>
                  <input type="text" id="route" v-model="user.route" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="">
                  <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Enter a valid route</p>
                </div>

                <div class="w-full px-3 mb-6 sm:w-1/2">
                    <label for="role" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Role</label>
                    <select id="role" v-model="user.role" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400">
                        <option value="">None</option>
                        <option value="driver">Driver</option>
                        <option value="admin">Admin</option>
                        <option value="others">Others</option>
                    </select>
                    <p class="mt-2 text-sm text-red-600 dark:text-green-500"><span class="font-medium">Please!</span> Select a gender</p>
                </div>
              </div>

              
              <div class="py-3">
                <button type="submit" class="flex justify-center h-10 p-5 px-4 py-3 text-sm font-medium text-white transition duration-150 ease-in-out bg-teal-500 border border-transparent rounded-md w-600 hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                  Update now
                </button>
              </div>
            </div>
          </form>
        </div>

        <!-- End of page content -->
      </main> 
      <!-- End of main content -->
    </div>
  </template>
  


  <script>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default {
  name: 'user-edit',
  setup() {
    const userId = ref('');
    const user = ref({});
    const isSidebarOpen = ref(false);
    const router = useRouter(); // Access the router object

    function toggleSidebar() {
      isSidebarOpen.value = !isSidebarOpen.value;
    }

    const getUser = async (userId) => {
      try {
        const res = await axios.get(`http://127.0.0.1:8000/api/users/${userId}`);
        user.value = res.data;
      } catch (error) {
        console.error('Error fetching user:', error);
      }
    };

    const updateUser = async () => {
      try {
        const res = await axios.put(`http://127.0.0.1:8000/api/users/${userId.value}`, user.value);
        alert(res.data.message);
        
        // Navigate to allusers page after successful update
        router.push('/users/allusers');
      } catch (error) {
        console.error('Error updating user:', error);
      }
    };

    return { userId, user, isSidebarOpen, toggleSidebar, getUser, updateUser };
  },
  async created() {
    this.userId = this.$route.params.id;
    await this.getUser(this.userId);
  }
};
</script>




<style scoped>
  /* Your scoped styles here */
</style>
