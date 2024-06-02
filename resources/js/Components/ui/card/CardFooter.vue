<script setup lang="ts">
import type { HTMLAttributes } from "vue";
import { cn } from "@/utils";

const props = defineProps<{
	class?: HTMLAttributes["class"];
}>();
</script>

<template>
	<div
		:class="cn('flex items-center justify-end gap-3 p-4 py-6', props.class)"
	>
		<slot />
	</div>
</template>
