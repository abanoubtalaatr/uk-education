<script setup lang="ts">
const props = defineProps<{
    bike: Bike;
}>();
const bikeInfo = computed(() => [
    {
        label: trans("bike-brand"),
        getValue: (bike: Bike) => bike.brand?.name,
    },

    {
        label: trans("bike-model"),
        getValue: (bike: Bike) => bike.model,
    },
    {
        label: trans("bike-type"),
        getValue: (bike: Bike) => bike.vehicle_type?.name,
    },
]);
</script>
<template>
    <div class="grid items-center gap-6 py-3 min-h-20 lg:grid-cols-5">
        <div class="max-sm:h-48">
            <img
                class="object-cover h-full max-w-full mx-auto"
                :src="bike.bike_photo ?? getImgPlaceholder(bike.brand?.name)"
            />
        </div>
        <template v-for="info in bikeInfo" :key="info.label">
            <div class="flex flex-col">
                <h3 class="text-sm font-medium">
                    {{ info.label }}
                </h3>
                <p class="capitalize text-primary-600">
                    {{ info.getValue(bike) }}
                </p>
            </div>
        </template>
        <div class="flex items-center gap-3 justify-self-end">
            <slot name="actions" />
        </div>
    </div>
</template>
