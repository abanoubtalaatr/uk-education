<!-- need popover and command components -->
<script
    setup
    lang="ts"
    generic="TOption, TValue = string | number | boolean | object"
>
import { ref } from "vue";
import { CheckIcon, ChevronDownIcon } from "@radix-icons/vue";
import { cn } from "@/utils";
import type { ButtonVariants } from "../button";
import Checkbox from "../checkbox/Checkbox.vue";

defineOptions({ inheritAttrs: false });

const props = withDefaults(
    defineProps<{
        multiple?: boolean;
        optionLabel?: keyof TOption | ((option: TOption) => string);
        optionValue?: keyof TOption | ((option: TOption) => TValue);
        options: TOption[];
        searchPlaceholder?: () => string;
        searchable?: boolean;
        placeholder?: () => string;
        emptyMessage?: () => string;
        roundness?: ButtonVariants["roundness"];
    }>(),
    {
        searchable: true,
        multiple: false,
        searchPlaceholder: () => "",
        placeholder: () => "",
        emptyMessage: () => trans("no-items-founded"),
        roundness: "sm",
    }
);
const optionToLabel = (option: TOption): string | undefined => {
    if (!option) return;

    if (typeof props.optionLabel === "function") {
        return props.optionLabel(option);
    }
    if (typeof option === "object" && props.optionLabel) {
        return option?.[props.optionLabel] as string;
    }

    return String(option);
};
const optionToValue = (option: TOption): TValue | undefined => {
    if (!option) return undefined;

    if (typeof props.optionValue === "function") {
        return props.optionValue(option) as TValue;
    }
    if (typeof option === "object" && props.optionValue) {
        return option?.[props.optionValue] as TValue;
    }

    return option as TValue;
};
const open = ref(false);
const modelValue = defineModel<TValue | TValue[]>();

function isEqual(obj1, obj2) {
    if (typeof obj1 !== "object" || typeof obj2 !== "object")
        return obj1 === obj2;
    var props1 = Object.getOwnPropertyNames(obj1);
    var props2 = Object.getOwnPropertyNames(obj2);
    if (props1.length != props2.length) {
        return false;
    }
    for (var i = 0; i < props1.length; i++) {
        let val1 = obj1[props1[i]];
        let val2 = obj2[props1[i]];
        let isObjects = isObject(val1) && isObject(val2);
        if (
            (isObjects && !isEqual(val1, val2)) ||
            (!isObjects && val1 !== val2)
        ) {
            return false;
        }
    }
    return true;
}
function isObject(object) {
    return object != null && typeof object === "object";
}

const handleSelect = (event) => {
    const newValue = event.detail.value;

    if (!props.multiple) {
        modelValue.value = newValue;
        open.value = false;
    } else {
        if (!Array.isArray(modelValue.value)) {
            modelValue.value = [newValue];
        }
        if (modelValue.value?.includes(newValue)) {
            modelValue.value?.splice(
                (modelValue.value as []).findIndex((value) =>
                    isEqual(value, newValue)
                ),
                1
            );
        } else {
            modelValue.value?.push(newValue);
        }
    }
};
// const options = toRef(() => props.options);
const selectedOptions = computed(() => {
    if (props.multiple) {
        return (
            props.options?.filter((option) =>
                modelValue.value?.includes(optionToValue(option))
            ) ?? []
        );
    } else {
        return (
            props.options?.filter((option) =>
                isEqual(modelValue.value, optionToValue(option))
            ) ?? []
        );
    }
});

const selectedOption = computed(() => {
    return selectedOptions.value[0] ?? null;
});

const selectedLabels = computed(() => {
    return selectedOptions.value.map((option) => optionToLabel(option));
});

const selectedLabel = computed(() => {
    return optionToLabel(selectedOption.value);
});

const data = computed(() => {
    return {
        selectedLabels: selectedLabels.value,
        selectedLabel: selectedLabel.value,
        selectedOptions: selectedOptions.value,
        selectedOption: selectedOption.value,
        selectedValues: modelValue.value,
        selectedValue: modelValue.value,
    };
});

const searchTerm = ref("");
const filteredOptions = computed(() => {
    return searchTerm.value === ""
        ? props.options
        : props.options?.filter((option) => {
              return optionToLabel(option)
                  ?.toLowerCase()
                  ?.includes(searchTerm.value.toLowerCase());
          });
});
</script>

<template>
    <Popover v-model:open="open">
        <PopoverTrigger as-child>
            <slot name="trigger">
                <Button
                    variant="outline"
                    role="combobox"
                    :aria-expanded="open"
                    class="flex justify-between w-full font-normal whitespace-normal hover:border-primary hover:text-primary"
                    icon="i-radix-icons-chevron-down"
                    trailing
                    v-bind="$attrs"
                    :roundness
                >
                    <template v-if="props.multiple">
                        <span
                            :class="[
                                'text-truncate',
                                !modelValue?.length && 'text-muted-foreground',
                            ]"
                        >
                            <slot
                                name="triggerLabel"
                                :data
                                :placeholder
                                :multiple
                            >
                                <div
                                    class="flex items-center gap-2"
                                    v-if="selectedLabels.length"
                                >
                                    <Badge
                                        :label="
                                            selectedLabels.length.toString()
                                        "
                                        variant="secondary"
                                    />
                                    <span class="text-truncate">{{
                                        selectedLabels[0]
                                    }}</span>
                                </div>
                                <template v-else>{{ placeholder() }}</template>
                            </slot>
                        </span>
                    </template>
                    <template v-else>
                        <span
                            :class="[
                                'text-truncate',
                                !modelValue && 'text-muted-foreground',
                            ]"
                        >
                            <slot
                                name="triggerLabel"
                                :data
                                :placeholder
                                :multiple
                            >
                                {{ modelValue ? selectedLabel : placeholder() }}
                            </slot>
                        </span>
                    </template>
                </Button>
            </slot>
        </PopoverTrigger>
        <PopoverContent
            class="p-0 w-radix-popover-trigger"
            :avoid-collisions="true"
            side="top"
            :zoom-animation="false"
        >
            <Command v-model:search-term="searchTerm" :multiple>
                <CommandInput
                    v-if="searchable"
                    class="h-9"
                    :placeholder="searchPlaceholder()"
                />
                <CommandEmpty>{{ emptyMessage() }}</CommandEmpty>
                <CommandList>
                    <CommandGroup>
                        <CommandItem
                            v-for="option in filteredOptions"
                            :key="optionToValue(option)"
                            :value="optionToValue(option)"
                            @select="handleSelect"
                        >
                            <template v-if="props.multiple">
                                <div
                                    class="flex items-center w-full gap-2 text-primary"
                                >
                                    <Checkbox
                                        :checked="
                                            modelValue?.includes(
                                                optionToValue(option)
                                            )
                                        "
                                    />
                                    <slot
                                        name="option"
                                        :option
                                        :value="optionToValue(option)"
                                        :label="optionToLabel(option)"
                                    >
                                        {{ optionToLabel(option) }}
                                    </slot>
                                </div>
                            </template>
                            <template v-else>
                                <slot
                                    name="option"
                                    :option
                                    :value="optionToValue(option)"
                                    :label="optionToLabel(option)"
                                >
                                    {{ optionToLabel(option) }}
                                </slot>
                                <CheckIcon
                                    :class="
                                        cn(
                                            'ml-auto h-4 w-4',
                                            modelValue === optionToValue(option)
                                                ? 'opacity-100'
                                                : 'opacity-0'
                                        )
                                    "
                                />
                            </template>
                        </CommandItem>
                    </CommandGroup>
                </CommandList>
            </Command>
        </PopoverContent>
    </Popover>
</template>
