<script setup lang="ts">
import { type HTMLAttributes, computed } from "vue";
import type { CheckboxRootEmits, CheckboxRootProps } from "radix-vue";
import { v4 as uuid } from "uuid";

import {
	CheckboxIndicator,
	CheckboxRoot,
	useForwardPropsEmits,
} from "radix-vue";
import { CheckIcon, DividerHorizontalIcon } from "@radix-icons/vue";
import { cn } from "@/utils";

const props = defineProps<
	CheckboxRootProps & {
		class?: HTMLAttributes["class"];
		label?: string;
		ui?: {
			label?: string;
			wrapper?: string;
		};
	}
>();
const emits = defineEmits<CheckboxRootEmits>();

const delegatedProps = computed(() => {
	const { class: _, ...delegated } = props;

	return delegated;
});

const forwarded = useForwardPropsEmits(delegatedProps, emits);

const fieldId = computed(() => {
	return props.id ?? `${uuid()}-radio-item`;
});
</script>

<template>
	<div :class="cn('inline-flex items-center gap-2', ui?.wrapper)">
		<CheckboxRoot
			v-bind="forwarded"
			:class="
				cn(
					'peer h-4 w-4 shrink-0 rounded-sm border border-input shadow transition-all focus-visible:border-secondary focus-visible:outline-none  focus-visible:ring-1 focus-visible:ring-secondary/50 disabled:cursor-not-allowed disabled:opacity-50 radix-state-checked:bg-primary radix-state-checked:text-primary-foreground   radix-state-indeterminate:bg-primary radix-state-indeterminate:text-primary-foreground ',
					props.class
				)
			"
			:id="fieldId"
		>
			<CheckboxIndicator
				class="flex h-full w-full items-center justify-center text-white duration-200 radix-state-checked:animate-in radix-state-checked:zoom-in radix-state-unchecked:animate-out radix-state-unchecked:zoom-out"
			>
				<slot>
					<DividerHorizontalIcon
						v-if="props.checked === 'indeterminate'"
						class="h-4 w-4"
					/>
					<CheckIcon v-else class="h-4 w-4" />
				</slot>
			</CheckboxIndicator>
		</CheckboxRoot>

		<Label v-if="props.label" :class="ui?.label" :for="fieldId" :label>
			{{ label }}
		</Label>
	</div>
</template>
