<script setup lang="ts">
import { type HTMLAttributes, computed } from "vue";
import { TabsTrigger, type TabsTriggerProps, useForwardProps } from "radix-vue";
import { cn } from "@/utils";

const props = defineProps<
    TabsTriggerProps & { class?: HTMLAttributes["class"] }
>();

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props;

    return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
    <TabsTrigger
        v-bind="forwardedProps"
        :class="
            cn(
                'inline-flex items-center justify-center whitespace-nowrap px-3 py-1 font-medium  transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring text-primary-300 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 data-[state=active]:text-primary data-[state=active]:font-medium',
                props.class
            )
        "
    >
        <slot />
    </TabsTrigger>
</template>
