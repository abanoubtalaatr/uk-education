import { cva, type VariantProps } from "class-variance-authority";
import type { ClassValue } from "clsx";
import { type PrimitiveProps } from "radix-vue";
import type { Component, HTMLAttributes } from "vue";

export { default as Button } from "./Button.vue";

export const buttonVariants = cva(
    "inline-flex relative group/btn  active:bg-opacity-90 items-center justify-center gap-1.5 whitespace-nowrap text-sm font-semibold transition-colors duration-300 focus-visible:outline-none first-letter:capitalize border border-transparent focus-visible:ring-1 focus-visible:ring-ring disabled:cursor-not-allowed disabled:opacity-50",
    {
        variants: {
            size: {
                default: "h-[2.25rem] px-4 py-2",
                sm: "h-8  rounded-md px-3 text-xs",
                lg: "h-10 rounded-md px-8",
                icon: "items-center size-[2.25rem] p-0.5",
                "icon-sm": "items-center size-[2rem] p-0.5",
            },
            variant: {
                default: "bg-primary text-white  hover:bg-primary-400",
                outline:
                    "border-primary bg-white hover:border-primary-400 hover:text-primary-400 text-primary",
                secondary:
                    "bg-white text-primary border-secondary-100 hover:border-primary hover:bg-primary-200 hover:text-primary-600",
                destructive:
                    "bg-destructive text-white  hover:bg-destructive/90",
                ghost: "hover:bg-secondary-50 hover:text-primary-400 text-primary",
                warning: "bg-amber-400 text-white  hover:bg-amber-400/80",
                soft: "bg-secondary-50 text-primary hover:text-primary-400 hover:bg-secondary-100",
                link: "text-primary underline-offset-2 p-0 underline",
                "link-secondary":
                    "text-secondary underline-offset-4 p-0 hover:underline",
                "ghost-destructive":
                    "hover:bg-destructive-foreground  text-destructive",
            },
            roundness: {
                base: "rounded-2xl",
                sm: "rounded-sm",
                circle: "rounded-full",
            },
        },
        defaultVariants: {
            variant: "default",
            size: "default",
            roundness: "base",
        },
    }
);

export const buttonIconVariants = cva("shrink-0", {
    variants: {
        size: {
            default: "size-4",
            sm: "size-3",
            lg: "size-6",
            icon: "size-5",
            "icon-sm": "size-4",
        },
    },
    defaultVariants: {
        size: "default",
    },
});
export type ButtonVariants = VariantProps<typeof buttonVariants>;

export interface ButtonProps {
    as: PrimitiveProps["as"] | Component | "link";
    asChild: PrimitiveProps["asChild"];
    variant?: ButtonVariants["variant"];
    size?: ButtonVariants["size"];
    class?: HTMLAttributes["class"];
    type: "button" | "submit" | "reset";
    linkAs: PrimitiveProps["as"] | Component;
    loading: boolean;
    disabled: boolean;
    label: string | number;
    truncate: boolean;
    block: boolean;
    loadingIcon: string;
    icon: ClassValue;
    trailing: boolean;
    leading: boolean;
    leadingIcon: ClassValue;
    leadingIconWrapperClass: ClassValue;
    trailingIcon: ClassValue;
    trailingIconWrapperClass: ClassValue;
    roundness: ButtonVariants["roundness"];
}
