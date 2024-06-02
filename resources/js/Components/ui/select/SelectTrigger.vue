<script setup lang="ts">
import { type HTMLAttributes, computed } from "vue";
import {
    SelectIcon,
    SelectTrigger,
    type SelectTriggerProps,
    useForwardProps,
} from "radix-vue";
import { CaretSortIcon } from "@radix-icons/vue";
import { cn } from "@/utils";
import { selectTriggerVariants, type SelectTriggerVariants } from ".";

const props = defineProps<
    SelectTriggerProps & {
        class?: HTMLAttributes["class"];
        roundness?: SelectTriggerVariants["roundness"];
    }
>();

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props;

    return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);
</script>

<template>
    <SelectTrigger
        v-bind="forwardedProps"
        :class="
            cn(
                'flex h-9 w-full items-center justify-between whitespace-nowrap border border-input bg-transparent px-3 py-2 text-sm text-primary shadow-sm ring-offset-background focus:outline-none focus-visible:border-secondary focus-visible:ring-1 focus-visible:ring-secondary/50 disabled:cursor-not-allowed disabled:opacity-50 radix-placeholder:text-muted-foreground [&>span]:line-clamp-1',
                selectTriggerVariants({ roundness }),
                props.class
            )
        "
    >
        <slot />
        <SelectIcon as-child>
            <CaretSortIcon class="-me-2 size-4 text-primary" />
        </SelectIcon>
    </SelectTrigger>
</template>
