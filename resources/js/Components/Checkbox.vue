<script setup lang="ts">
import { computed } from "vue";
import { v4 as uuid } from "uuid";
import type { ClassValue } from "clsx";

const emit = defineEmits(["update:modelValue"]);

const props = withDefaults(
    defineProps<{
        id?: string;
        modelValue: Array<string | number> | boolean;
        value?: string | number | boolean;
        label?: string;
        ui?: { label?: ClassValue };
    }>(),
    {
        id: () => `field-${uuid()}`,
    }
);

const proxyChecked = computed({
    get() {
        return props.modelValue;
    },

    set(val) {
        if (Array.isArray(val)) {
        }
        emit("update:modelValue", val);
    },
});
</script>

<template>
    <div
        :class="[
            cn(
                '[&:not(:last-child)]:mie-4 inline-flex items-center gap-2',
                $attrs.class
            ),
        ]"
    >
        <input
            :id="id"
            v-model="proxyChecked"
            type="checkbox"
            :value="value"
            v-bind="$attrs"
            class="transition-colors border rounded shadow-sm cursor-pointer peer form-checkbox accent-current focus:ring-0 focus:ring-offset-0 focus-visible:ring-1 focus-visible:ring-primary focus-visible:ring-offset-1 focus-visible:ring-offset-primary-200 dark:focus-visible:ring-offset-primary-900"
            :class="[
                'text-primary',
                'bg-gray-50 checked:!bg-primary dark:bg-gray-900 ',
                'border-gray-200 hover:border-gray-300 dark:border-gray-700 dark:hover:border-gray-600',
            ]"
        />
        <Label :for="id" :class="props?.ui?.label">
            <slot>
                {{ label }}
            </slot>
        </Label>
    </div>
</template>
