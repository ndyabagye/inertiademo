<template>
    <AuthenticatedLayout>

        <Head>
            <title>Home Page</title>
        </Head>
        <h1 class="text-2xl font-bold">Hello , {{ username }}</h1>
    </AuthenticatedLayout>
</template>

<script setup>
import {Head} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

defineProps({
    username: String
})

</script>
