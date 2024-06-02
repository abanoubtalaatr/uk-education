<script setup lang="ts">
import { type HTMLAttributes, computed } from "vue";
import { v4 as uuid } from "uuid";

import {
	RadioGroupIndicator,
	RadioGroupItem,
	type RadioGroupItemProps,
	useForwardProps,
} from "radix-vue";
import { cn } from "@/utils";

const props = defineProps<
	RadioGroupItemProps & {
		class?: HTMLAttributes["class"];
		label?: string;
		ui?: {
			label?: string;
			item?: string;
			wrapper?: string;
		};
	}
>();

const delegatedProps = computed(() => {
	const { class: _, ...delegated } = props;

	return delegated;
});

const forwardedProps = useForwardProps(delegatedProps);

const fieldId = computed(() => {
	return props.id ?? `${uuid()}-radio-item`;
});
</script>

<template>
	<div :class="cn('inline-flex items-center gap-2')">
		<RadioGroupItem
			v-bind="forwardedProps"
			:id="fieldId"
			:class="
				cn(
					'aspect-square h-4 w-4 rounded-full border border-primary text-primary ring-offset-background focus:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50',
					props.class
				)
			"
		>
			<RadioGroupIndicator
				class="flex items-center justify-center duration-200 radix-state-checked:animate-in radix-state-checked:zoom-in radix-state-unchecked:animate-out radix-state-unchecked:zoom-out"
			>
				<svg
					xmlns="http://www.w3.org/2000/svg"
					viewBox="0 0 24 24"
					fill="currentColor"
					stroke="currentColor"
					stroke-width="2"
					stroke-linecap="round"
					stroke-linejoin="round"
					class="size-2"
				>
					<circle cx="12" cy="12" r="10" />
				</svg>
			</RadioGroupIndicator>
		</RadioGroupItem>

		<Label v-if="props.label" :class="ui?.label" :for="fieldId" :label>
			{{ label }}
		</Label>
	</div>
</template>
