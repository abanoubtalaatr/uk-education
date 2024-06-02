<script setup lang="ts">
import { cn } from "@/utils";
import { Label } from "radix-vue";
import type { HTMLAttributes } from "vue";
interface LabelProps {
    label?: string;
    for?: string;
    required?: boolean;
    showRequired?: boolean;
    showOptional?: boolean;
    class?: HTMLAttributes["class"];
}
const props = withDefaults(defineProps<LabelProps>(), {
    showRequired: true,
});
</script>

<template>
    <Label
        :for="props.for"
        :class="
            cn(
                ' text-sm/normal font-medium text-primary  transition-colors duration-200 first-letter:capitalize hover:text-primary-600 group-focus-within:text-primary-500',
                'after:ms-2 after:text-xs after:text-gray-300',
                required &&
                    showRequired &&
                    'before:text-red-500 before:content-[attr(data-required-label)]',
                !required &&
                    showOptional &&
                    'after:text-muted-foreground after:content-[attr(data-optional-label)]',
                props.class
            )
        "
        :data-required-label="`*`"
        :data-optional-label="'(optional)'"
    >
        <template v-if="$slots.default">
            <slot />
        </template>
        <span v-else>{{ label }}</span>
    </Label>
</template>

<style></style>
