<script setup lang="ts">
const props = defineProps({
    header: String,
});

const settingsItems = computed(() => [
    {
        label: trans("account-settings"),
        href: route("settings.account.show"),
        active: route().current("settings.account.show"),
        icon: "i-radix-icons-person",
    },
    {
        label: trans("notification-settings"),
        href: route("settings.notifications.show"),
        active: route().current("settings.notifications.show"),
        icon: "i-radix-icons-gear",
    },
    {
        label: trans("privacy-settings"),
        href: route("settings.privacy.show"),
        active: route().current("settings.privacy.show"),
        icon: "i-radix-icons-lock-closed",
    },
    {
        label: trans("interests"),
        href: route("settings.interests.show"),
        active: route().current("settings.interests.show"),
        icon: "i-radix-icons-heart",
    },
    {
        label: trans("help"),
        href: route("settings.interests.show"),
        active: route().current("settings.help.show"),
        icon: "i-radix-icons-question-mark-circled",
    },
]);
</script>
<template>
    <AppLayout>
        <div class="grid lg:grid-cols-[20rem_1fr] gap-6 container">
            <section class="space-y-6">
                <h2 class="title-2xl">{{ $t("settings") }}</h2>
                <Card class="self-start">
                    <CardContent class="flex flex-col items-start gap-2">
                        <template
                            v-for="item in settingsItems"
                            :key="item.label"
                        >
                            <Button
                                :href="item.href"
                                :icon="item.icon"
                                :label="item.label"
                                :variant="item.active ? 'soft' : 'ghost'"
                                class="text-xl font-medium font-alegreya-sans-sc"
                            />
                        </template>
                    </CardContent>
                </Card>
            </section>
            <section class="page-wrapper">
                <h2 class="title-2xl">{{ props.header }}</h2>
                <slot />
            </section>
        </div>
    </AppLayout>
</template>
