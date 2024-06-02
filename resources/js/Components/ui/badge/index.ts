import { type VariantProps, cva } from "class-variance-authority";

export { default as Badge } from "./Badge.vue";

export const badgeVariants = cva(
    "inline-flex items-center border-transparent rounded-full border px-2.5 py-0.5 text-xs font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2",
    {
        variants: {
            variant: {
                default: " bg-primary text-primary-foreground  ",
                secondary: " bg-secondary text-secondary-foreground ",
                destructive: " bg-red-100 text-destructive border-destructive ",
                warning: " bg-yellow-100 text-yellow-500 border-yellow-500 ",
                success: " bg-green-100 text-green-500 border-green-500 ",
                gray: " bg-zinc-100 text-zinc-500 border-zinc-500 ",
                danger: " bg-green-100 text-green-500 ",
                soft: " bg-secondary-50 text-secondary",
                outline: "text-primary border-primary",
                ghost: "hover:bg-secondary-50 hover:text-primary-400 text-primary",
            },
        },
        defaultVariants: {
            variant: "default",
        },
    }
);

export type BadgeVariants = VariantProps<typeof badgeVariants>;
