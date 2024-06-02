<script setup lang="ts">
import { cn } from "@/utils";
import type { HtmlHTMLAttributes } from "vue";

interface DescriptionProps {
	description?: string;
	id?: string;
	class?: HtmlHTMLAttributes["class"];
}
const props = defineProps<DescriptionProps>();
</script>

<template>
	<p :id="props.id" :class="cn('text-sm text-muted-foreground', props.class)">
		<template v-if="$slots.default">
			<slot />
		</template>
		<span v-else>{{ description }}</span>
	</p>
</template>

<style></style>
