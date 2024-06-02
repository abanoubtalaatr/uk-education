<script setup lang="ts">
import { Slot } from "radix-vue";

const props = defineProps<{
	id: string;
	name?: string;
	ariaDescribedby: string;
	ariaInvalid: boolean | "false" | "true";
}>();
</script>

<template>
	<Slot :id :aria-describedby :aria-invalid :name>
		<slot />
	</Slot>
</template>

<style></style>
