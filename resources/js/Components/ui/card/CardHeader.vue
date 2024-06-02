<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/utils";

const props = defineProps<{
    class?: HTMLAttributes["class"];
    align?: "vertical" | "horizontal";
}>();
const alignClass = computed(
    () =>
        ({
            vertical: "flex-col items-start",
            horizontal: "items-center",
        }[props.align])
);
</script>

<template>
    <div
        :class="
            cn(
                'flex  gap-2 border-b border-primary-200 p-4 py-6 max-md:flex-col justify-between items-center',
                alignClass,
                props.class
            )
        "
    >
        <slot />
    </div>
</template>
