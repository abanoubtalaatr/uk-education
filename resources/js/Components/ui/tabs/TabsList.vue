<script setup lang="ts">
import { type HTMLAttributes, computed } from "vue";
import { TabsIndicator, TabsList, type TabsListProps } from "radix-vue";
import { cn } from "@/utils";

const props = defineProps<
    TabsListProps & { class?: HTMLAttributes["class"] }
>();

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props;

    return delegated;
});
</script>

<template>
    <TabsList
        v-bind="delegatedProps"
        :class="
            cn(
                'flex h-9 items-center  border-b border-primary-200 p-1 text-muted-foreground relative',
                props.class
            )
        "
    >
        <TabsIndicator
            class="absolute left-0 h-[2px] bottom-0 w-[--radix-tabs-indicator-size] translate-x-[--radix-tabs-indicator-position] rounded-full transition-[width,transform] duration-300"
        >
            <div class="w-full h-full bg-primary" />
        </TabsIndicator>
        <slot />
    </TabsList>
</template>
