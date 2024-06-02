import type { ClassValue } from "clsx";
import { cva, type VariantProps } from "class-variance-authority";
import type { HTMLAttributes, InputHTMLAttributes } from "vue";

export { default as Input } from "./Input.vue";

export const inputVariants = cva("", {
    variants: {
        size: {
            xs: "[--input-h:theme(spacing.6)] [--input-px:theme(spacing.2)] [--input-py:theme(spacing.1)] [--icon-width:theme(spacing.6)] rounded text-xs/tight",
            sm: "[--input-h:theme(spacing.8)] [--input-px:theme(spacing.2)] [--input-py:theme(spacing.1)] [--icon-width:theme(spacing.7)] rounded text-xs/tight",
            default:
                "[--input-h:2.25rem] [--input-px:theme(spacing.3)] [--input-py:theme(spacing.1)] [--icon-width:theme(spacing.9)] rounded-md text-sm/tight",
            lg: "[--input-h:theme(spacing.10)] [--input-px:theme(spacing.3)] [--input-py:theme(spacing.1)]  [--icon-width:theme(spacing.10)] rounded-md text-base/tight",
        },
    },
    defaultVariants: {
        size: "default",
    },
});

export type InputVariants = VariantProps<typeof inputVariants>;
export interface InputProps {
    defaultValue?: string | number;
    modelValue?: string | number;
    class?: HTMLAttributes["class"];
    autocomplete?: InputHTMLAttributes["autocomplete"];
    inputClass?: HTMLAttributes["class"];
    size?: InputVariants["size"];
    loading?: boolean;
    disabled?: InputHTMLAttributes["disabled"];
    readonly?: InputHTMLAttributes["readonly"];
    loadingIcon?: string;
    icon?: ClassValue;
    trailing?: boolean;
    leading?: boolean;
    leadingIcon?: ClassValue;
    leadingIconWrapperClass?: ClassValue;
    trailingIcon?: ClassValue;
    trailingIconWrapperClass?: ClassValue;
    hasFocus?: boolean;
}
