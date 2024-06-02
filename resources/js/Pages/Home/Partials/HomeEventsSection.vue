<script setup lang="ts">
const props = defineProps<{
    events: TEvents;
}>();
</script>
<template>
    <section aria-labelledby="events-title" class="container space-y-6">
        <div class="flex flex-col items-center gap-4">
            <h2 id="events-title" class="text-center home-title">
                {{ $t("upcoming-events") }}
            </h2>
            <AppSearchInput />
            <EventFilter />
        </div>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            <template v-if="events.length">
                <template v-for="event in events" :key="event.id">
                    <EventCard :event="event" />
                </template>
                <Button
                    class="justify-self-center col-span-full"
                    :label="$t('view-all-events')"
                    :href="route('events.index')"
                />
            </template>
            <Empty v-else :message="$t('no-upcoming-events')" />
        </div>
    </section>
</template>
