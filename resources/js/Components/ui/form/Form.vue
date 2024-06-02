<script setup lang="ts">
import { cn } from "@/utils";
import type { HtmlHTMLAttributes } from "vue";
const props = defineProps<{
	class?: HtmlHTMLAttributes["class"];
}>();
defineEmits(["submit"]);
</script>

<template>
	<form
		@submit.prevent="$emit('submit')"
		:class="cn('flex flex-col gap-6', props?.class)"
	>
		<slot />
	</form>
</template>

<style></style>
