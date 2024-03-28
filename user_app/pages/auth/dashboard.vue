<template>
 <div  v-if="isLogged">
  <div class="flex h-screen bg-gray-100">
    <!-- Desktop Sidebar -->
    <aside class="hidden w-64 text-gray-100 bg-gray-800 lg:block">
      <!-- Sidebar content -->
      <nav class="py-5 p-7" style="margin-top: 90px;">
        <ul class="py-4">
          <li>
            <nuxt-link to="/auth/dashboard" class="block px-6 py-2 shadow-md hover:bg-gray-700">Dashboard</nuxt-link>
          </li>
          <br>
          <li>
            <nuxt-link to="/auth/resert_password" class="block px-6 py-2 hover:bg-gray-700">Reset-Password</nuxt-link>
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
          

          <div class="p-6 bg-white rounded-lg shadow-md">
            <h1 class="mb-4 text-2xl font-bold">Orders</h1>
            <div v-if="loading" class="text-center">
              Loading...
            </div>
            <div v-else>
              <div class="overflow-x-auto">
                <table class="min-w-full border-collapse">
                  <thead>
                    <tr>
                      <th class="px-4 py-2 text-left border">Amblnc Number</th>
                      <th class="px-4 py-2 text-left border">Route</th>
                      <th class="px-4 py-2 text-left border">Client Name</th>
                      <th class="px-4 py-2 text-left border">Address</th>
                      <th class="px-4 py-2 text-left border">Phone</th>
                      <th class="px-4 py-2 text-left border">Confirm</th>
                      <th class="px-4 py-2 text-left border">ConfirmedAT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="order in orders" :key="order.id">
                      <td class="px-4 py-2 border">{{ order.amblnc_number }}</td>
                      <td class="px-4 py-2 border">{{ order.route }}</td>
                      <td class="px-4 py-2 border">{{ order.clientName }}</td>
                      <td class="px-4 py-2 border">{{ order.address }}</td>
                      <td class="px-4 py-2 border">{{ order.phone }}</td>
                      <td class="px-4 py-2 border">{{ order.confirm }}</td>
                      <td class="px-4 py-2 border">{{ order.created_at }}</td>
                    </tr>
                  </tbody>
                </table>
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
const orders = ref([]);
const loading = ref(true);



// Check if user is logged in after component mounted
onMounted(() => {
  isLogged.value = process.client && localStorage.getItem('token') !== null;
  if (isLogged.value) {
    axios.get('http://127.0.0.1:8000/api/user/name', {
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


//logout function
function logout() {
  const token = localStorage.getItem('token'); // Retrieve the token from local storage
  if (!token) {
    console.error('Token not found in local storage');
    return;
  }
  axios.post('http://127.0.0.1:8000/api/logoutv6', {}, {
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


//dash toggle
function toggleSidebar() {
  isSidebarOpen.value = !isSidebarOpen.value;
}


// Logic for fetching orders
async function fetchOrders() {
  try {
    const token = localStorage.getItem('token'); // Retrieve the token from local storage
    const response = await axios.get('http://127.0.0.1:8000/api/ordersv2', {
      headers: {
        'Authorization': `Bearer ${token}` // Send token in the Authorization header
      }
    });
    orders.value = response.data;
    loading.value = false;
  } catch (error) {
    console.error('Error fetching orders:', error);
    loading.value = false;
  }
}


onMounted(fetchOrders);
</script>


<style scoped>
/* Add your custom styles here */
</style>