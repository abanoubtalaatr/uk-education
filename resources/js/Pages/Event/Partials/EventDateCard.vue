<script setup lang="ts">
const props = defineProps<{
    date: Date;
}>();
const page = usePage();
const locale = computed(() => page.props.locale);
</script>
<template>
    <div class="absolute text-lg font-medium rounded-md top-4 left-4 w-min">
        <div
            class="px-5 py-1 text-center word-break bg-white/60 backdrop-blur-[2px] rounded-t-md border border-b-0 border-white"
        >
            <span>{{
                formatDate(date, locale == "en" ? "MMM DD YYYY" : "DD MMM YYYY")
            }}</span>
        </div>
        <div
            class="p-1 py-1 text-sm text-center text-white border text-primary bg-primary border-primary"
        >
            {{ formatDate(date, "hh:mm A") }}
        </div>
    </div>
</template>
