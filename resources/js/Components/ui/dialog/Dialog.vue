<script setup lang="ts">
import {
    type DialogRootEmits,
    type DialogRootProps,
    useForwardPropsEmits,
} from "radix-vue";
import type { DialogVariants } from ".";

const props = defineProps<
    DialogRootProps & {
        title: string;
        description?: string;
        width?: DialogVariants["width"];
    }
>();
const emits = defineEmits<DialogRootEmits>();
const dialogProps = computed(() => {
    const { title, description, width, ...rest } = props;
    return rest;
});
const forwarded = useForwardPropsEmits(dialogProps, emits);
</script>

<template>
    <DialogRoot v-bind="forwarded">
        <DialogTrigger as-child> <slot name="trigger" /> </DialogTrigger>
        <DialogContent :aria-describedby="undefined" :width>
            <DialogHeader>
                <DialogTitle>{{ title }}</DialogTitle>
                <DialogDescription v-if="description">
                    {{ description }}
                </DialogDescription>
            </DialogHeader>

            <div class="-m-2 max-h-[calc(100vh_-_10rem)] overflow-y-auto p-2">
                <slot />
            </div>
            <DialogFooter>
                <slot name="footer" />
            </DialogFooter>
        </DialogContent>
    </DialogRoot>
</template>

<style></style>
