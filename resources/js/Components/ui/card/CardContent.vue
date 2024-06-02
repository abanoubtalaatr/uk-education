<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/utils";

const props = defineProps<{
	class?: HTMLAttributes["class"];
}>();
</script>

<template>
	<div :class="cn('p-4 py-6 text-sm text-foreground', props.class)">
		<slot />
	</div>
</template>
