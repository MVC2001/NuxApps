<template>
 <div  v-if="isLogged">
  <div class="flex h-screen bg-gray-100">
    <!-- Desktop Sidebar -->
    <aside class="hidden w-64 text-gray-100 bg-gray-800 lg:block">
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
            <nuxt-link to="/ambulance/allInfo" class="block px-6 py-2 hover:bg-gray-700">Amulances</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/orders" class="block px-6 py-2 hover:bg-gray-700">All-Orders</nuxt-link>
          </li>
          <li>
            <nuxt-link to="/orders/comfirmed" class="block px-6 py-2 hover:bg-gray-700">ConfirmedOrders</nuxt-link>
          </li>
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
          <h1 class="text-xl font-bold text-bg-teal-900">Welcome: {{ userEmail }}</h1>
        </div>
        <!-- Logout button -->
        <button @click="logout" class="px-4 py-2 text-white bg-teal-500 rounded hover:bg-red-600">Logout</button>
      </header>
      <!-- End of top navigation -->

      <!-- Page content -->
      <div class="p-4">
        <!-- Check if user is logged in and authenticated -->
        <div >
          
          <!-- Your page content goes here -->
          <div class="flex" style="margin-top:40px">
            <div class="w-1/4 px-4">
              <div class="p-4 rounded-lg shadow-md bg-white-500" style="height:120px;box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;">
                <p>Card 1</p>
              </div>
            </div>
            <div class="w-1/4 px-4">
              <div class="p-4 rounded-lg shadow-md bg-white-500" style="height:120px;box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;">
                <p>Card 2</p>
              </div>
            </div>
            <div class="w-1/4 px-4">
              <div class="p-4 rounded-lg shadow-md bg-white-500" style="height:120px;box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;">
                <p>Card 3</p>
              </div>
            </div>
            <div class="w-1/4 px-4">
              <div class="p-4 rounded-lg shadow-md bg-white-500" style="height:120px;box-shadow: rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgb(209, 213, 219) 0px 0px 0px 1px inset;">
                <p>Card 4</p>
              </div>
            </div>
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
  <div v-else>
    <p class="text-red-500">You are not permitted to access this dashboard. Please log in.</p>
  </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios'; // Import Axios for making HTTP requests
import { useRouter } from 'vue-router'; // Import useRouter to access the router instance

const router = useRouter(); // Access the router instance
const isSidebarOpen = ref(false);
const isLogged = ref(false);
const userEmail = ref('');


// Check if user is logged in after component mounted
onMounted(() => {
  isLogged.value = process.client && localStorage.getItem('token') !== null;
  if (isLogged.value) {
    axios.get('http://127.0.0.1:8000/api/user/namev7', {
      headers: {
        'Authorization': `Bearer ${localStorage.getItem('token')}` // Send token in the Authorization header
      }
    })
    .then(response => {
      userEmail.value = response.data.email;
    })
    .catch(error => {
      console.error('Error fetching user email:', error);
    });
  }
});


function logout() {
  const token = localStorage.getItem('token'); // Retrieve the token from local storage
  if (!token) {
    console.error('Token not found in local storage');
    return;
  }

  axios.post('http://127.0.0.1:8000/api/logoutv7', {}, {
    headers: {
      'Authorization': `Bearer ${token}` // Send token in the Authorization header
    }
  })
  .then(response => {
    // Handle successful logout
    console.log(response.data.message); // Assuming the response contains a 'message' field

    // Clear token from local storage
    localStorage.removeItem('token');

    // Navigate to the home page (/)
    router.push('/');

    // Optionally, perform any other actions after logout
  })
  .catch(error => {
    // Handle error
    console.error('Logout failed:', error);
    // Optionally, perform fallback actions (e.g., show an error message)
  });
}



function toggleSidebar() {
  isSidebarOpen.value = !isSidebarOpen.value;
}
</script>

<style scoped>
/* Add your custom styles here */
</style>