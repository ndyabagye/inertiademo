<script setup>

import {Link} from "@inertiajs/vue3";

defineProps({
    links: Array
})
</script>

<template>
    <div>
        <Component
            class="px-1"
            :class="{'text-grey-500': !link.url, 'font-bold text-blue-500': link.active}"
            :is="link.url ? Link : 'span'"
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
        />
    </div>
</template>
