<script setup>
import { useObjectUrl } from "@vueuse/core";
import { ref } from "vue";
import { v4 as uuid } from "uuid";
import { twMerge } from "tailwind-merge";

const props = defineProps({
	multiple: {
		type: Boolean,
		default: false,
	},
	loading: {
		type: Boolean,
		default: false,
		required: false,
	},
	class: String,
});

const emit = defineEmits(["inputUpdate"]);

const fileInput = ref();
const files = ref([]);

function clickFileInput() {
	fileInput.value.click();
}

function handleFileInputChange(e) {
	if (!e.target.files.length) return;
	handleFiles(e.target.files);
}
function handleFiles(rawFiles) {
	Array.from(rawFiles).forEach((file) => {
		let url = useObjectUrl(file);
		files.value.push({
			file: file,
			id: uuid(),
			url: url.value,
			name: file.name,
			type: file.type,
			size: getFileSize(file),
		});
	});

	handleEmitValue();
	reset();
}
function handleEmitValue() {
	let rawFilesArray = files.value.map((file) => {
		return file.file;
	});
	if (props.multiple) {
		emit("inputUpdate", rawFilesArray, files.value);
	} else {
		/**
		 * Description
		 * @param {any} "inputUpdate"
		 * @param {Blob} rawFilesArray[0]
		 * @param {any} files.value[0]
		 * @returns {any}
		 */
		emit("inputUpdate", rawFilesArray[0], files.value[0]);
	}
}
function reset() {
	files.value = [];
	fileInput.value.value = null;
}

function getFileType(file) {
	let type = file.type;

	let fileType;
	switch (true) {
		case type.startsWith("image/"):
			fileType = "image";
			break;
		case type.startsWith("video/"):
			fileType = "video";
			break;
	}
	return fileType;
}
function getFileSize(file) {
	let number = file.size;
	if (number < 1024) {
		return `${number} bytes`;
	} else if (number >= 1024 && number < 1048576) {
		return `${(number / 1024).toFixed(1)} KB`;
	} else if (number >= 1048576) {
		return `${(number / 1048576).toFixed(1)} MB`;
	}
}

const draggingEnter = ref(false);
const draggingLeave = ref(false);
const draggingOver = ref(false);

const draggingStatue = ref({});
function handleDragEnter(e) {
	draggingEnter.value = true;
}
function handleDragOver(e) {
	draggingOver.value = true;
}
function handleDragLeave(e) {
	draggingLeave.value = true;
	draggingEnter.value = false;
	draggingOver.value = false;
}
function handleDrop(e) {
	let droppedFiles = e.dataTransfer.files;
	handleFiles(droppedFiles);
	draggingOver.value = false;
}
</script>

<template>
	<div
		:class="cn('flow-root  w-fit cursor-pointer', props.class)"
		id="dropzone"
		dropzone
		@click="clickFileInput"
		@drop.prevent="handleDrop"
		@dragover.stop.prevent="handleDragOver"
		@dragleave.stop.prevent="handleDragLeave"
		@dragenter.stop.prevent="handleDragEnter"
	>
		<input
			ref="fileInput"
			type="file"
			class="hidden"
			v-bind="$attrs"
			@change="handleFileInputChange"
			:multiple="multiple"
		/>
		<slot :draggingOver="draggingOver">
			<Button :loading="loading">Upload File</Button>
		</slot>
	</div>
</template>

<style scoped></style>
