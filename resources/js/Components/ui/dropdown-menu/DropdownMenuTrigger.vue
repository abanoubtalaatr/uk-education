<script setup lang="ts">
import {
	DropdownMenuTrigger,
	type DropdownMenuTriggerProps,
	useForwardProps,
} from "radix-vue";

const props = withDefaults(defineProps<DropdownMenuTriggerProps>(), {
	asChild: true,
});

const forwardedProps = useForwardProps(props);
</script>

<template>
	<DropdownMenuTrigger class="outline-none" v-bind="forwardedProps">
		<slot>
			<Button
				:aria-label="$t('options')"
				icon="i-solar-menu-dots-bold"
				variant="secondary"
				class="radix-state-open:bg-primary radix-state-open:text-white"
				size="icon"
				v-bind="$attrs"
			/>
		</slot>
	</DropdownMenuTrigger>
</template>
