import type { VariantProps } from "class-variance-authority";

export { default as DialogRoot } from "./DialogRoot.vue";
export { default as DialogClose } from "./DialogClose.vue";
export { default as DialogTrigger } from "./DialogTrigger.vue";
export { default as DialogHeader } from "./DialogHeader.vue";
export { default as DialogTitle } from "./DialogTitle.vue";
export { default as DialogDescription } from "./DialogDescription.vue";
export { default as DialogContent } from "./DialogContent.vue";
export { default as DialogScrollContent } from "./DialogScrollContent.vue";
export { default as DialogFooter } from "./DialogFooter.vue";

export const dialogVariants = cva("", {
	variants: {
		width: {
			sm: "sm:max-w-sm",
			md: "sm:max-w-md",
			lg: "sm:max-w-lg",
			xl: "sm:max-w-xl",
			"2xl": "sm:max-w-2xl",
			"3xl": "sm:max-w-3xl",
			"4xl": "sm:max-w-4xl",
			"5xl": "sm:max-w-5xl",
			"6xl": "sm:max-w-6xl",
			"7xl": "sm:max-w-7xl",
			auto: "sm:max-w-none",
		},
	},
	defaultVariants: {
		width: "lg",
	},
});

export type DialogVariants = VariantProps<typeof dialogVariants>;
