<script setup lang="ts" generic="TOption, TGroup, TValue">
import type { SelectRootProps, SelectRootEmits } from "radix-vue";
import type { SelectTriggerVariants } from ".";

const props = withDefaults(
    defineProps<{
        options?: TOption[] | undefined;
        groups?: TGroup[] | undefined;
        optionLabel?: keyof TOption | ((item: TOption) => string);
        optionValue?: keyof TOption | ((item: TOption) => TValue);
        placeholder?: string;
        roundness?: SelectTriggerVariants["roundness"];
    }>(),
    {
        placeholder: "search",
        roundness: "default",
    }
);

const selectProps = computed(() => {
    const { options: items, groups, placeholder, ...rest } = props;
    return rest;
});
const emits = defineEmits<SelectRootEmits>();
const forwarded = useForwardPropsEmits(selectProps, emits);

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
</script>

<template>
    <SelectRoot v-bind="forwarded">
        <slot name="trigger" :placeholder="placeholder">
            <SelectTrigger :roundness="roundness">
                <SelectValue
                    :placeholder
                    class="[data-placeholder]:text-muted-foreground"
                />
            </SelectTrigger>
        </slot>

        <SelectContent>
            <slot name="content">
                <slot name="options">
                    <template
                        v-for="(option, index) in options"
                        :key="optionToValue(option)"
                    >
                        <SelectItem :value="optionToValue(option)">
                            <slot name="option" :option>
                                {{ optionToLabel(option) }}
                            </slot>
                        </SelectItem>
                    </template>
                </slot>
            </slot>
            <!-- <slot name="groups" /> -->

            <!-- <slot name="group" /> -->
            <!-- <SelectGroup>
                <SelectLabel>Fruits</SelectLabel>
                <SelectItem value="apple"> Apple </SelectItem>
            </SelectGroup> -->
        </SelectContent>
    </SelectRoot>
</template>

<style></style>
