<script setup lang="ts">
const modelValue = defineModel<string | number | undefined>();
const inputType = ref<"password" | "text">("password");
const changeInputType = () => {
    if (inputType.value == "password") {
        return (inputType.value = "text");
    }
    return (inputType.value = "password");
};
</script>
<template>
    <Input v-model="modelValue" :type="inputType">
        <template #trailing>
            <button
                type="button"
                :class="[' relative size-4 text-primary']"
                @click="changeInputType"
            >
                <span
                    :class="[
                        inputType == 'text'
                            ? 'i-radix-icons-eye-none'
                            : 'i-radix-icons-eye-open',
                    ]"
                ></span>
            </button>
        </template>
    </Input>
</template>
<style>
input::-ms-reveal,
input::-ms-clear {
    display: none;
}
</style>
