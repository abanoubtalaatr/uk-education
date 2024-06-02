<script setup lang="ts">
const publicLinks = computed(() => [
    {
        label: trans("terms-of-services"),
        href: "",
    },
    {
        label: trans("privacy-policy"),
        href: "",
    },
    {
        label: trans("cookie-policy"),
        href: "",
    },
]);

const navItems = computed(() => [
    {
        label: trans("find-events"),
        href: route("events.index"),
        active: route().current("events.*"),
    },
    {
        label: trans("my-events"),
        href: route("my-event"),
        active: route().current("my-event"),
    },
    {
        label: trans("home"),
        href: route("home"),
        active: route().current("home"),
    },
]);
</script>
<template>
    <footer>
        <section
            class="container flex items-center justify-between py-6 space-y-6 border-t max-md:flex-col border-primary"
        >
            <div class="space-y-6">
                <ApplicationLogo class="test-black" />
                <p class="max-w-sm text-3xl font-semibold text-pretty">
                    {{
                        $t(
                            "get-started-to-up-your-business-with-personal-ai-manager"
                        )
                    }}
                </p>
            </div>
            <div class="grid grid-rows-3 md:grid-flow-col gap-x-12">
                <template v-for="(item, index) in publicLinks" :key="index">
                    <Button
                        as="a"
                        variant="link"
                        :href="item.href"
                        target="_blank"
                        class="text-start"
                        >{{ item.label }}</Button
                    >
                </template>
                <template v-for="(item, index) in navItems" :key="index">
                    <Button
                        as="a"
                        variant="link"
                        :href="item.href"
                        target="_blank"
                        >{{ item.label }}</Button
                    >
                </template>
            </div>
            <AppShareButtons
                :text="$t('lets-choose-event-of-bikes-to-attendee-from-here')"
                :url="route('home')"
            />
        </section>
        <section class="bg-primary">
            <div
                class="container flex items-center justify-between gap-6 py-4 text-white max-md:flex-col"
            >
                <small>{{ $t("copy-right-c-2023-bird-solutions") }}</small>
            </div>
        </section>
    </footer>
</template>
