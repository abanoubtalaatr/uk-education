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
        class="w-full h-full"
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
                class="relative flex items-center w-full gap-3 p-2 border-2 border-dashed rounded-lg group/image-preview min-h-24 shrink-0 grow border-primary-300 bg-primary-100"
            >
                <template v-if="fileData?.url">
                    <Button
                        @click.stop="removeFile"
                        color="danger"
                        variant="ghost"
                        size="xs"
                        class="absolute top-0 rounded-none end-0 rounded-es-xl"
                        icon="i-radix-icons-cross-1"
                    />
                    <slot name="preview" :fileData>
                        <div class="self-center max-w-16">
                            <img
                                :src="fileData.url"
                                :alt="fileData?.name ?? 'image preview'"
                                class="object-cover w-full overflow-hidden"
                            />
                        </div>
                        <div
                            v-if="fileData?.name"
                            class="relative gap-2 text-sm group/file-name shrink grow-0"
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
                                class="absolute hidden min-h-0 no-underline -translate-y-1/2 end-0 top-1/2 group-hover/file-name:flex"
                                icon="i-radix-icons-cross-1"
                            />
                        </div>
                    </slot>
                </template>
                <template v-else>
                    <slot
                        name="trigger"
                        :file="fileData"
                        :removeFile="removeFile"
                    >
                        <span
                            class="mx-auto text-xs text-center i-radix-icons-plus size-5 text-primary"
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
