<template>
    <Head>
        <title>My App</title>
        <meta type="description" content="Information about my app">
    </Head>
	<section class="py-3 px-2 bg-gray-200 rounded-sm">
		<header class="flex justify-between">
			<h1 class="font-bold text-lg">My App</h1>
            <input type="text" value="My App">
			<Nav />
		</header>
	</section>

	<section class="p-6" v-bind="$attrs">
		<div class="max-w-3xl mx-auto">
			<slot />
		</div>
	</section>
</template>

<script setup>
import {Head} from "@inertiajs/vue3";
import Nav from '@/Shared/Nav.vue'
</script>
