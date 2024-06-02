<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        message?: string;
        description?: string;
        icon?: string;
        ui?: {
            message?: string;
            description?: string;
            icon?: string;
        };
    }>(),
    {
        icon: "i-radix-icons-moon",
    }
);
</script>

<template>
    <div class="flex flex-col items-center gap-3 text-center">
        <slot name="content">
            <slot name="image">
                <span
                    :class="cn('h-20 w-20 text-secondary-200', icon, ui?.icon)"
                />
            </slot>
            <slot name="message">
                <span
                    class="font-semibold text-lg/5 text-primary first-letter:capitalize"
                    :class="cn('', ui?.message)"
                    v-text="props.message ?? $t('no-data-found')"
                />
            </slot>
            <slot name="description">
                <span
                    class="text-sm text-muted-foreground first-letter:capitalize"
                    :class="cn('', ui?.description)"
                    v-text="description"
                />
            </slot>
            <slot v-if="$slots.default" />
        </slot>
    </div>
</template>

<style></style>
