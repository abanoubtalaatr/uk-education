<script lang="ts" setup>
import { Toaster as Sonner, type ToasterProps } from "vue-sonner";

const props = defineProps<ToasterProps>();
</script>

<template>
	<Sonner
		class="toaster [--btn-text-color]:text-primary group"
		v-bind="props"
		:duration="3000"
		:toast-options="{
			classes: {
				toast: 'group toast group-[.toaster]:border-border group-[.toaster]:text-white group-[.toaster]:shadow-lg',
				default:
					'group-[.toaster]:bg-primary [--btn-text-color:theme(colors.primary.DEFAULT)]',
				title: 'group-[.toast]:text-white',
				description: 'group-[.toast]:text-gray-200',
				actionButton:
					'group-[.toast]:bg-white font-bold group-[.toast]:text-[--btn-text-color]',
				cancelButton:
					'group-[.toast]:bg-muted group-[.toast]:text-muted-foreground',
				error: 'group-[.toaster]:bg-red-800 [--btn-text-color:theme(colors.red.500)]',
				info: '[--btn-text-color:theme(colors.secondary.DEFAULT)]',
				success:
					'group-[.toaster]:bg-green-800 [--btn-text-color:theme(colors.green.500)]',
				warning:
					'group-[.toaster]:bg-orange-800 [--btn-text-color:theme(colors.orange.500)]',
			},
		}"
	>
		<template #error-icon>
			<span class="i-solar-close-circle-outline" />
		</template>
		<template #success-icon>
			<span class="i-solar-check-circle-outline" />
		</template>
		<template #info-icon>
			<span class="i-solar-check-circle-outline" />
		</template>
		<template #warning-icon>
			<span class="i-solar-forbidden-outline" />
		</template>
	</Sonner>
</template>
