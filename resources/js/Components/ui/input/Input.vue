<script setup lang="ts">
import { useVModel } from "@vueuse/core";
import { cn } from "@/utils";
import { inputVariants, type InputProps } from ".";

defineOptions({ inheritAttrs: false });
const props = withDefaults(defineProps<InputProps>(), {
    loadingIcon: "i-app-loading",
});

const emits = defineEmits<{
    (e: "update:modelValue", payload: string | number): void;
}>();

const modelValue = useVModel(props, "modelValue", emits, {
    passive: true,
    defaultValue: props.defaultValue,
});

const isLeading = computed(() => {
    return (
        (props.icon && props.leading) ||
        (props.icon && !props.trailing) ||
        props.leadingIcon
    );
});
const isTrailing = computed(() => {
    return (props.icon && props.trailing) || props.trailingIcon;
});
const isTrailingOnly = computed(() => isTrailing.value && !isLeading.value);

const leadingIconName = computed(() => {
    return props.loading ? props.loadingIcon : props.leadingIcon || props.icon;
});

const trailingIconName = computed(() => {
    return props.loading && isTrailingOnly.value
        ? props.loadingIcon
        : props.trailingIcon || props.icon;
});
const input = ref();
defineExpose({ focus: () => input.value.focus(), el: input });
</script>

<template>
    <div
        :class="
            cn(
                'relative flex grow items-center overflow-hidden shadow-sm transition-colors duration-300 selection:bg-secondary-200 selection:text-primary',
                'border border-input has-[input:focus:not([readonly])]:border-secondary has-[input[aria-invalid=true]]:border-red-500 has-[input:focus]:ring-1 has-[input:focus]:ring-secondary/50',
                'bg-transparent  has-[input[disabled]]:bg-gray-100 has-[input[readonly]]:bg-gray-50 ',
                'text-primary has-[input[disabled]]:text-muted-foreground has-[input[readonly]]:text-foreground',
                '[--icon-padding:theme(spacing.2)]',
                inputVariants({ size }),
                props.class
            )
        "
    >
        <span
            v-if="(isLeading && leadingIconName) || $slots.leading"
            :class="
                cn(
                    'absolute inset-y-0 start-0 flex h-full w-[--icon-width] items-center justify-center px-[--icon-padding]',
                    leadingIconWrapperClass
                )
            "
        >
            <slot name="leading">
                <span :class="cn(leadingIconName)"></span>
            </slot>
        </span>
        <input
            v-model="modelValue"
            v-bind="$attrs"
            :disabled
            :readonly
            :class="
                cn(
                    'flex h-[calc(var(--input-h)_-_2px)]  w-full px-[--input-px] py-[--input-py] transition-colors  duration-300 file:mt-1 file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-primary  focus-visible:outline-none   disabled:cursor-not-allowed disabled:opacity-50',
                    'bg-transparent  placeholder-muted-foreground',
                    ((isLeading && leadingIconName) || $slots.leading) &&
                        ' ps-[--icon-width]',
                    ((isTrailing && trailingIconName) || $slots.trailing) &&
                        ' pe-[--icon-width]',
                    props.inputClass
                )
            "
            ref="input"
            v-focus="hasFocus"
        />
        <span
            v-if="(isTrailing && trailingIconName) || $slots.trailing"
            :class="
                cn(
                    'absolute inset-y-0 end-0 flex h-full w-[--icon-width] items-center justify-center px-[--icon-padding]',
                    trailingIconWrapperClass
                )
            "
        >
            <slot name="trailing">
                <span :class="cn(trailingIconName)"></span>
            </slot>
        </span>
    </div>
</template>
