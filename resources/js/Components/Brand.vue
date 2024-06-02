<script setup lang="ts">
const props = defineProps({
    brand: {
        type: Object,
        required: true,
    },
    selected: Boolean,
});
</script>

<template>
    <div class="relative border rounded-lg h-24 w-24 flex cursor-pointer" :class="props.selected? 'border-black': ''">
        <div class="absolute top-2 right-2 rounded-full border border-black h-4 w-4 p-0.5">
            <div v-if="props.selected" class="bg-black h-full w-full rounded-full">

            </div>
        </div>
        <div  class="flex items-center justify-center w-full h-full">
            <img v-if="props.brand.image" :src="props.brand.image" class="h-2/3 w-2/3"  alt="">
            <ApplicationLogo v-if="!props.brand.image" class="text-black" />
        </div>
    </div>
</template>

<style scoped>

</style>
