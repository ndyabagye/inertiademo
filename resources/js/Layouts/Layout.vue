<template>
	<section class="py-3 px-2 bg-gray-200 rounded-sm">
		<header class="flex justify-between">
			<h1 class="font-bold text-lg">My App</h1>
            <input type="text" value="My App">
			<Nav />
		</header>
	</section>

	<section class="p-6">
		<div class="max-w-3xl mx-auto">
			<slot />
		</div>
	</section>
</template>

<script setup>
import Nav from '@/Shared/Nav.vue'
</script>
