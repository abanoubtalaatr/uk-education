<script setup lang="ts">
import {
    TooltipTrigger,
    TooltipArrow,
    type TooltipTriggerProps,
    type TooltipContentProps,
} from "radix-vue";

const props = withDefaults(
    defineProps<
        TooltipTriggerProps & {
            content?: string;
            contentProps?: TooltipContentProps;
        }
    >(),
    {}
);

const triggerProps = computed(() => {
    const { content, contentProps, ...rest } = props;
    return rest;
});
</script>

<template>
    <TooltipTrigger v-bind="{ ...triggerProps, class: $attrs?.class }">
        <slot />
    </TooltipTrigger>
    <TooltipContent
        v-if="content || $slots.contents"
        class="origin-[--radix-tooltip-content-transform-origin]"
        side="top"
        :avoid-collisions="true"
        v-bind="props.contentProps"
    >
        <slot name="content" v-if="$slots.content" />
        <span v-else v-text="content" class="first-letter:capitalize" />

        <TooltipArrow class="fill-primary" />
    </TooltipContent>
</template>
