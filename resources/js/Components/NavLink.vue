<script setup>
const props = defineProps({
    href: String,
    active: Boolean,
});
</script>

<template>
    <Button :variant="active ? 'soft' : 'ghost'" :href="href">
        <slot />
    </Button>
</template>
