<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { type BadgeVariants, badgeVariants } from ".";
import { cn } from "@/utils";

const props = defineProps<{
	variant?: BadgeVariants["variant"];
	class?: HTMLAttributes["class"];
	label?: string;
	icon?: string;
}>();
</script>

<template>
	<div :class="cn(badgeVariants({ variant }), props.class)">
		<slot>
			<span v-if="icon" :class="cn('size-4 shrink-0', icon)" />
			<span class="first-letter:capitalize">{{ label }}</span>
		</slot>
	</div>
</template>
