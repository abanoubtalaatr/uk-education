<script setup lang="ts">
const locale = computed(() => {
    if (usePage().props.locale === "ar") {
        return "en";
    }
    return "ar";
});

const setLocale = function () {
    router.post(
        route("language", [locale.value]),
        {},
        {
            preserveState: false,
            preserveScroll: false,
            onSuccess: () => {
                window.location.reload();
            },
        }
    );
};
</script>
<template>
    <Button size="icon" :label="$t('language')" @click="setLocale" />
</template>
