<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/utils";

const props = defineProps<{
    class?: HTMLAttributes["class"];
}>();
</script>

<template>
    <div
        :class="
            cn(
                'rounded-xl bg-card  text-card-foreground shadow-sm border border-primary-200',
                props.class
            )
        "
    >
        <slot />
    </div>
</template>
