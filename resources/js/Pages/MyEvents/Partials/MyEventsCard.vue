<script setup lang="ts">
const props = defineProps<{
    event: TEvent;
}>();
</script>
<template>
    <Link
        class="relative flex items-end bg-center bg-no-repeat bg-cover min-h-96 rounded-2xl"
        :style="`background-image: url(${
            event.featured_image !== '' ? event.featured_image : getImgPlaceholder(event?.name)
        })`"
        :href="route('events.show', [event])"
    >
        <!-- overlay -->
        <div
            class="absolute inset-0 transition-colors duration-300 bg-black/50 hover:bg-transparent rounded-2xl"
        ></div>
        <EventDateCard :date="event.start_date" />
        <div class="relative z-10 p-6">
            <h3 class="text-3xl font-semibold text-white font-alegreya-sans-sc">
                {{ event.name }}
            </h3>
            <p class="text-white line-clamp-3" v-html="event.description" />
        </div>
    </Link>
</template>
