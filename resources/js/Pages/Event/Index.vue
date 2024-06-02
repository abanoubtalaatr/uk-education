<script setup lang="ts">
import Button from "@/Components/ui/button/Button.vue";

const props = defineProps<{
    events: PaginatedData<TEvent>;
}>();
const eventTabs = computed(() => [
    {
        label: trans("upcoming-events"),
        value: "upcoming-events",
    },
    {
        label: trans("previous-events"),
        value: "previous-events",
    },
]);
const activeTab = ref<"previous-events" | "upcoming-events">(
    route().params?.type ?? "upcoming-events"
);
watch(activeTab, (type) => {
    router.get(
        "",
        { type },
        {
            preserveScroll: true,
            preserveState: true,
        }
    );
});
</script>

<template>
    <AppLayout>
        <div class="container page-wrapper">
            <div class="flex flex-wrap justify-between gap-2">
                <h1 class="title-2xl">
                    {{ $t("find-events") }}
                </h1>
                <div class="flex self-end gap-1 p-1 rounded-full bg-primary-50">
                    <Button
                        :variant="!route().params?.type ? 'default' : 'soft'"
                        :href="route('events.index')"
                        >{{ $t("all-event") }}</Button
                    >
                    <template v-for="tab in eventTabs" :key="tab.value">
                        <Button
                            :variant="
                                route().params?.type === tab.value
                                    ? 'default'
                                    : 'soft'
                            "
                            :href="route('events.index', { type: tab.value })"
                            >{{ tab.label }}</Button
                        >
                    </template>
                </div>
            </div>
            <div class="flex items-center gap-6 max-lg:flex-col">
                <EventFilter />
                <AppSearchInput class="grow" />
            </div>
            <section>
                <div
                    class="grid gap-6 md:grid-cols-2 lg:grid-cols-3"
                    v-if="events.data.length"
                >
                    <template v-for="event in events.data" :key="event.id">
                        <EventCard :event="event" />
                    </template>
                    <Pagination class="col-span-full" :meta="events.meta" />
                </div>
                <Empty :message="$t('no-events-found')" v-else />
            </section>
        </div>
    </AppLayout>
</template>
<style>
.dp__theme_light .dp__input {
    --dp-border-radius: theme(borderRadius.full);
}
</style>
