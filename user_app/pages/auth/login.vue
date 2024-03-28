<template>
    <div>
        <div class="flex flex-col justify-center min-h-screen px-6 py-12 bg-gray-50 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <img class="w-auto h-10 mx-auto" src="https://www.svgrepo.com/show/301692/login.svg" alt="Workflow">
                <h2 class="mt-6 text-3xl font-extrabold leading-9 text-center text-gray-900">
                    Sign in to your account
                </h2>
                <p class="mt-2 text-sm leading-5 text-center text-blue-500 max-w">
                    Or
                    <registerlink
                        class="font-medium text-blue-500 transition duration-150 ease-in-out hover:text-blue-500 focus:outline-none focus:underline">
                        <NuxtLink to="/"> go-home</NuxtLink>
                    </registerlink>
                </p>
                
                <div>
                    <div v-if="errorMessage" class="p-4 mb-4 text-red-700 bg-red-100 border border-red-400 rounded">
                        {{ errorMessage }}
                    </div>
    
                    <!-- Alert for successful login -->
                    <div v-if="successMessage" class="p-4 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
                        {{ successMessage }}
                    </div>
                </div>
            </div>
        
        
            <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
                    <form @submit.prevent="login">
                        <div>
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
                            <div class="relative mt-1 rounded-md shadow-sm">
                                <input v-model="email" id="email" name="email" placeholder="user@example.com" type="email" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                                <div class="absolute inset-y-0 right-0 flex items-center hidden pr-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
        
                        <div class="mt-6">
                            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input v-model="password" id="password" name="password" type="password" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
                            </div>
                        </div>
        
                        <div class="mt-6">
                            <span class="block w-full rounded-md shadow-sm">
                                <button :disabled="loading" type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out bg-teal-500 border border-transparent rounded-md hover:bg-blue-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                                    <template v-if="loading">
                                        <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24"></svg>
                                        Loading...
                                    </template>
                                    <template v-else>
                                        Sign in
                                    </template>
                                </button>
                            </span>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();
const email = ref('');
const password = ref('');
const loading = ref(false);
const errorMessage = ref('');
const successMessage = ref('');

//login logic
const login = async () => {
    loading.value = true;
    try {
        const response = await fetch('http://127.0.0.1:8000/api/loginv6', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                email: email.value,
                password: password.value,
            }),
        });

        if (response.ok) {
            const data = await response.json();
            localStorage.setItem('token', data.token);
            router.push('/auth/dashboard');
            successMessage.value = 'Login successful. Redirecting to dashboard...';
        } else {
            const errorData = await response.json();
            console.error('Login failed:', errorData.message);
            errorMessage.value = errorData.message;
        }
    } catch (error) {
        console.error('An error occurred during login:', error);
        errorMessage.value = 'An error occurred during login. Please try again later.';
    } finally {
        loading.value = false;
    }
};
</script>

<style scoped>

</style>
