<script setup lang="ts">
const props = defineProps<{
    event: TEvent;
}>();
</script>
<template>
    <!-- date -->
    <div class="space-y-2">
        <div class="flex items-center gap-2">
            <span
                class="inline-flex items-center justify-center p-1.5 text-white rounded-full bg-primary-950"
            >
                <span class="i-radix-icons-calendar size-4"></span>
            </span>
            <span class="text-sm font-medium text-primary-950">
                {{ formatDate(event.start_date) }}
            </span>
        </div>
        <!-- locations -->
        <div class="flex items-center gap-2" v-if="event.city">
            <span
                class="inline-flex items-center justify-center p-1.5 text-white rounded-full bg-primary-950"
            >
                <span class="i-heroicons-map-pin size-4"></span>
            </span>
            <span
                v-html="event.city?.name"
                class="text-sm font-medium text-primary-950"
            />
        </div>
        <div class="flex items-center gap-2" v-if="event.city">
            <span
                class="inline-flex items-center justify-center p-1.5 text-white rounded-full bg-primary-950"
            >
                <span class="i-heroicons-map size-4"></span>
            </span>
            <Button
                variant="link"
                :href="event.location_link"
                target="_blank"
                as="a"
                >{{ $t("go-to-location") }}</Button
            >
        </div>
    </div>
</template>
