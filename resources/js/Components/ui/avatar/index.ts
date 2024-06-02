import { type VariantProps, cva } from "class-variance-authority";

export { default as AvatarRoot } from "./AvatarRoot.vue";
export { default as AvatarImage } from "./AvatarImage.vue";
export { default as AvatarFallback } from "./AvatarFallback.vue";

export const avatarVariant = cva(
	"inline-flex items-center justify-center font-normal text-white select-none shrink-0 bg-primary overflow-hidden",
	{
		variants: {
			size: {
				xs: "size-8 text-xs",
				sm: "size-10 text-xs",
				base: "size-16 text-2xl",
				lg: "size-32 text-5xl",
			},
			shape: {
				circle: "rounded-full",
				square: "rounded-md",
			},
		},
	}
);

export type AvatarVariants = VariantProps<typeof avatarVariant>;
