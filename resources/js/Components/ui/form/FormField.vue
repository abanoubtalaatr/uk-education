<script setup lang="ts">
import { cn } from "@/utils";
import { Slot } from "radix-vue";
import { v4 as uuid } from "uuid";
import type { HtmlHTMLAttributes } from "vue";

interface FieldProps {
	id?: string;
	class?: HtmlHTMLAttributes["class"];
	name?: string;
	label?: string;
	error?: string;
	description?: string;
	errorPosition?: "below-input" | "below-label";
	ui?: {
		label?: string;
		error?: string;
		description?: string;
	};
	layout?: "horizontal" | "vertical" | "checkbox";
	size?: "sm" | "md" | "lg";
	required?: boolean;
	showRequired?: boolean;
	showOptional?: boolean;
}
const props = withDefaults(defineProps<FieldProps>(), {
	layout: "vertical",
	errorPosition: "below-input",
	showOptional: false,
	showRequired: true,
});

const fieldId = computed(() => {
	return props.id ?? `${uuid()}-form-item`;
});
const descriptionId = computed(() => {
	return `${fieldId.value}-description`;
});
const errorId = computed(() => {
	return `${fieldId.value}-error`;
});

const fieldLayout = cva("flex gap-2", {
	variants: {
		layout: {
			vertical: "flex-col",
			horizontal: "flex-col sm:flex-row sm:items-center",
			checkbox: "flex-row-reverse justify-end gap-4 items-center ",
		},
	},
});
</script>

<template>
	<div
		:class="cn('group relative flex flex-col gap-2 ', props?.class)"
		v-auto-animate
	>
		<div
			class="flex gap-2"
			:class="cn(fieldLayout({ layout: props.layout }))"
		>
			<div class="flex items-center justify-between gap-2">
				<FieldLabel
					v-if="props.label"
					:class="ui?.label"
					:for="fieldId"
					:label
					:size
					:show-optional
					:show-required
					:required
				/>
				<slot v-if="$slots?.labelContent" name="labelContent" />
			</div>

			<FieldError
				v-if="props.error && props.errorPosition === 'below-label'"
				:id="errorId"
				:class="ui?.error"
				:size
				:error
			/>
			<div class="flex gap-2">
				<FormControl
					:id="fieldId"
					:aria-describedby="
						props.error
							? `${errorId} ${descriptionId}`
							: `${descriptionId}`
					"
					:aria-invalid="!!error ? 'true' : 'false'"
					:name
				>
					<slot />
				</FormControl>
			</div>
		</div>
		<FieldError
			v-if="props.error && props.errorPosition === 'below-input'"
			:id="errorId"
			:class="ui?.error"
			:size
			:error
		/>

		<FieldDescription
			v-if="props.description"
			:id="descriptionId"
			:class="ui?.description"
			:size
			:description
		/>
	</div>
</template>

<style></style>
