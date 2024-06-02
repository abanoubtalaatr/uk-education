<script setup>
const props = defineProps({
	/** @type{import("vue").PropType<|null|undefined>} */
	modelValue: [Object, String],
	fileData: Object,
	placeholder: {
		default: "Logo sample",
		type: String,
	},
	withImagePreview: {
		default: true,
		type: Boolean,
	},
	showButton: {
		default: false,
		type: Boolean,
	},
	buttonLabel: {
		default: "upload",
		type: String,
	},
});
const emit = defineEmits(["update:modelValue"]);

const fileData = ref(props.fileData ?? null);

const setData = ref(false);

watch(
	() => props?.fileData,
	(newData) => {
		if (!setData.value) {
			fileData.value = newData;
		}
	},
	{ immediate: true }
);

function handleFileChange(file, data) {
	emit("update:modelValue", file);
	fileData.value = data;
	setData.value = true;
}
const removeFile = () => {
	emit("update:modelValue", null);
	fileData.value = null;
};
</script>
<template>
	<FileInput
		@input-update="handleFileChange"
		v-slot="{ draggingOver }"
		class="h-full w-full"
		dd="dd"
	>
		<div
			:class="[
				'flex h-full w-full flex-col gap-4 rounded border-2 md:flex-row md:items-center',
				draggingOver
					? 'border-dashed border-gray-50 bg-gray-50 dark:border-gray-800 dark:bg-gray-700  '
					: 'border-transparent',
			]"
		>
			<div
				v-if="withImagePreview"
				class="group/image-preview relative flex min-h-24 w-full shrink-0 grow items-center gap-3 rounded-lg border-2 border-dashed border-secondary-300 bg-secondary-50 p-2"
			>
				<template v-if="fileData?.url">
					<Button
						@click.stop="removeFile"
						color="danger"
						variant="ghost"
						size="xs"
						class="absolute end-0 top-0 rounded-none rounded-es-xl"
						icon="i-radix-icons-cross-1"
					/>
					<slot name="preview" :fileData>
						<div class="max-w-16 self-center">
							<img
								:src="fileData.url"
								:alt="fileData?.name ?? 'image preview'"
								class="w-full overflow-hidden object-cover"
							/>
						</div>
						<div
							v-if="fileData?.name"
							class="group/file-name relative shrink grow-0 gap-2 text-sm"
						>
							<Button
								as="a"
								target="_blank"
								variant="link"
								@click.stop=""
								:href="fileData.url"
								:label="fileData?.name"
								:title="fileData?.name"
								truncate
								class="font-normal"
							/>
							<Button
								@click.stop="removeFile"
								variant="soft"
								size="xs"
								class="absolute end-0 top-1/2 hidden min-h-0 -translate-y-1/2 no-underline group-hover/file-name:flex"
								icon="i-lucide-x"
							/>
						</div>
					</slot>
				</template>
				<template v-else>
					<slot name="trigger" :file="fileData" :removeFile="removeFile">
						<span
							class="i-radix-icons-plus mx-auto size-5 text-center text-xs text-secondary"
						/>
					</slot>
				</template>
			</div>
			<template v-if="showButton">
				<slot name="trigger" :file="fileData" :removeFile="removeFile">
					<Button variant="soft">
						{{ buttonLabel }}
					</Button>
				</slot>
			</template>
		</div>
	</FileInput>
</template>
