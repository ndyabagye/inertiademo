<template>
    Users Page
    <div class="mt-[800px]">
        <p>
            The current time is {{ time }}.
        </p>

        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/vue3'

defineProps({
    time: String,
})

</script>
