<!-- pages/viewInfo.vue -->

<template>
  <div>
    <h2>Ambulance Details</h2>
    <div v-if="ambulance">
      <p>Category: {{ ambulance.category }}</p>
      <p>Brand: {{ ambulance.brand }}</p>
      <p>Ambulance Number: {{ ambulance.amblnc_number }}</p>
      <p>Route: {{ ambulance.route }}</p>
      <p>Price: {{ ambulance.price }}</p>
      <img :src="getImageUrl(ambulance.image)" alt="Ambulance Image" style="max-width: 200px; max-height: 200px;" />
    </div>
    <router-link to="/">Back to List</router-link>
  </div>
</template>

<script setup>
import { ref } from 'vue';
import axios from 'axios';
import { useRoute } from 'vue-router';

const route = useRoute();
const ambulance = ref(null);

const fetchAmbulanceById = async () => {
  const id = route.params.id;
  try {
    const response = await axios.get(`http://127.0.0.1:8000/api/ambulances/${id}`);
    ambulance.value = response.data;
  } catch (error) {
    console.error('Error fetching ambulance:', error);
  }
};

const getImageUrl = (image) => {
  return `http://127.0.0.1:8000/images/${image}`;
};

fetchAmbulanceById();
</script>
