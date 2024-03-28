<template>
    <div>
    <!-- component -->
<!-- This is an example component -->
<div class="max-w-2xl mx-auto">

	<div class="mb-6">
		<label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Your name</label>
		<input type="text" id="username-success" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="Bonnie Green">
		<p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Alright!</span> Username
			available!</p>
	</div>
	<div>
		<label for="username-error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Your name</label>
		<input type="text" id="username-error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400" placeholder="Bonnie Green">
		<p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already
			taken!</p>
	</div>

	<p class="mt-5">This form component is part of a larger, open-source library of Tailwind CSS components. Learn more
		by going to the official <a class="text-blue-600 hover:underline"
			href="#" target="_blank">Flowbite Documentation</a>.
	</p>
</div>


<div class="flex flex-wrap -mx-3">
  <div class="mb-6 px-3 w-full sm:w-1/2">
      <label for="username-success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Your name</label>
      <input type="text" id="username-success" class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400" placeholder="Bonnie Green">
      <p class="mt-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium">Alright!</span> Username available!</p>
  </div>
  <div class="px-3 w-full sm:w-1/2">
      <label for="username-error" class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500">Your name</label>
      <input type="text" id="username-error" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400" placeholder="Bonnie Green">
      <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span> Username already taken!</p>
  </div>
</div>

<p class="mt-5">This form component is part of a larger, open-source library of Tailwind CSS components. Learn more by going to the official <a class="text-blue-600 hover:underline" href="#" target="_blank">Flowbite Documentation</a>.</p>




<div class="mb-6">
  <label
    for="username-success"
    class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500"
    >Your name</label
  >
  <input
    type="text"
    id="username-success"
    class="bg-green-50 border border-green-500 text-green-900 placeholder-green-700 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-green-100 dark:border-green-400"
    placeholder="Bonnie Green"
  />
  <p class="mt-2 text-sm text-green-600 dark:text-green-500">
    <span class="font-medium">Alright!</span> Username available!
  </p>
</div>


<div>
  <label
    for="username-error"
    class="block mb-2 text-sm font-medium text-red-700 dark:text-red-500"
    >Your name</label
  >
  <input
    type="text"
    id="username-error"
    class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:bg-red-100 dark:border-red-400"
    placeholder="Bonnie Green"
  />
  <p class="mt-2 text-sm text-red-600 dark:text-red-500">
    <span class="font-medium">Oops!</span> Username already taken!
  </p>
</div>
    </div>
</template>

<script setup>

</script>

<style scoped>

</style>