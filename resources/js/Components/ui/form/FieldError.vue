<script setup lang="ts">
import { cn } from "@/utils";
import type { HtmlHTMLAttributes } from "vue";

interface ErrorProps {
	error?: string;
	id?: string;
	class?: HtmlHTMLAttributes["class"];
}
const props = defineProps<ErrorProps>();
</script>

<template>
	<p
		:id="props.id"
		:class="cn('text-sm/normal text-destructive', props.class)"
	>
		<template v-if="$slots.default">
			<slot />
		</template>
		<span v-else>{{ error }}</span>
	</p>
</template>

<style></style>
