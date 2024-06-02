<script setup lang="ts">
import type { VueDatePickerProps, EmitEvents } from "@vuepic/vue-datepicker";
// VueDatePickerProps don't work throw error
const props = withDefaults(defineProps<{}>(), {
    teleport: "html",
});
const model = defineModel();
const emit = defineEmits([
    "update:model-value",
    "update:model-timezone-value",
    "text-submit",
    "closed",
    "cleared",
    "open",
    "focus",
    "blur",
    "internal-model-change",
    "recalculate-position",
    "flow-step",
    "update-month-year",
    "invalid-select",
    "tooltip-open",
    "tooltip-close",
    "invalid-fixed-range",
    "time-picker-open",
    "time-picker-close",
    "am-pm-change",
    "range-start",
    "range-end",
    "date-update",
    "invalid-date",
]);

const forwarded = useForwardPropsEmits(props, emit);
</script>

<template>
    <DatePicker v-bind="forwarded" :teleport="'html'" auto-apply />
</template>

<style>
.dp__theme_light {
    --dp-background-color: theme(colors.white);
    --dp-text-color: theme(colors.primary.DEFAULT);
    --dp-hover-color: theme(colors.primary.DEFAULT);
    --dp-hover-text-color: theme(colors.secondary.DEFAULT);
    --dp-hover-icon-color: theme(colors.secondary.50);
    --dp-primary-color: theme(colors.primary.DEFAULT);
    --dp-primary-text-color: theme(colors.white);
    --dp-secondary-color: theme(colors.gray.400);
    --dp-border-color: theme(colors.primary.DEFAULT);
    --dp-menu-border-color: theme(colors.secondary.200);
    --dp-border-color-hover: theme(colors.secondary.DEFAULT);
    --dp-disabled-color: #f6f6f6;
    --dp-scroll-bar-background: #f3f3f3;
    --dp-scroll-bar-color: #959595;
    --dp-success-color: #76d275;
    --dp-success-color-disabled: #a3d9b1;
    --dp-icon-color: theme(colors.gray.400);
    --dp-danger-color: #ff6f60;
    --dp-highlight-color: rgba(25, 118, 210, 0.1);
}
</style>
