<script setup lang="ts">
import { type HTMLAttributes, computed } from "vue";
import {
    AlertDialogDescription,
    type AlertDialogDescriptionProps,
} from "radix-vue";
import { cn } from "@/utils";

const props = defineProps<
    AlertDialogDescriptionProps & { class?: HTMLAttributes["class"] }
>();

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props;

    return delegated;
});
</script>

<template>
    <AlertDialogDescription
        v-bind="delegatedProps"
        :class="cn('text-2xl font-medium first-letter:capitalize', props.class)"
    >
        <slot />
    </AlertDialogDescription>
</template>
