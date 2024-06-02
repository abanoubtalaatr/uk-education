export { default as SelectRoot } from "./SelectRoot.vue";
export { default as SelectValue } from "./SelectValue.vue";
export { default as SelectTrigger } from "./SelectTrigger.vue";
export { default as SelectContent } from "./SelectContent.vue";
export { default as SelectGroup } from "./SelectGroup.vue";
export { default as SelectItem } from "./SelectItem.vue";
export { default as SelectItemText } from "./SelectItemText.vue";
export { default as SelectLabel } from "./SelectLabel.vue";
export { default as SelectSeparator } from "./SelectSeparator.vue";
export { default as SelectScrollUpButton } from "./SelectScrollUpButton.vue";
export { default as SelectScrollDownButton } from "./SelectScrollDownButton.vue";

import { type VariantProps } from "class-variance-authority";
export const selectTriggerVariants = cva("", {
    variants: {
        roundness: {
            default: "rounded-md",
            full: "rounded-full",
        },
    },
    defaultVariants: {
        roundness: "default",
    },
});
export type SelectTriggerVariants = VariantProps<typeof selectTriggerVariants>;
