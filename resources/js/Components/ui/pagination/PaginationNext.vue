<script setup lang="ts">
import { type HTMLAttributes, computed } from "vue";
import { PaginationNext, type PaginationNextProps } from "radix-vue";
import { ChevronRightIcon } from "@radix-icons/vue";
import { Button } from "@/Components/ui/button";
import { cn } from "@/utils";

const props = withDefaults(
    defineProps<PaginationNextProps & { class?: HTMLAttributes["class"] }>(),
    {
        asChild: true,
    }
);

const delegatedProps = computed(() => {
    const { class: _, ...delegated } = props;

    return delegated;
});
</script>

<template>
    <PaginationNext v-bind="delegatedProps">
        <Button :class="cn('h-9 w-9 p-0', props.class)" variant="ghost">
            <slot>
                <ChevronRightIcon class="rtl:rotate-180" />
            </slot>
        </Button>
    </PaginationNext>
</template>
