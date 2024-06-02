<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    active: Boolean,
    href: String,
    as: String,
});
</script>

<template>
    <Link
        :class="[
            'py-2 px-3 block rounded-lg hover:bg-primary-400 transition-all duration-300',
            active ? 'bg-white text-primary' : 'text-white ',
        ]"
        :href="href"
    >
        <slot />
    </Link>
</template>
