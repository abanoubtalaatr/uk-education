<script setup lang="ts">
import { DialogClose, type DialogCloseProps } from "radix-vue";

const props = withDefaults(defineProps<DialogCloseProps>(), { asChild: true });
</script>

<template>
    <DialogClose v-bind="props">
        <slot>
            <Button :label="$t('cancel')" variant="outline" />
        </slot>
    </DialogClose>
</template>
