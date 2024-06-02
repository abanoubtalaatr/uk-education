<script setup lang="ts">
const props = defineProps<{
    pastEvents: Resource<TEvents>;
    futureEvents: Resource<TEvents>;
}>();
</script>

<template>
    <AppLayout>
        <Head :title="$t('my-events')" />
        <div class="container page-wrapper">
            <h2 class="auth-title">{{ $t("my-events") }}</h2>
            <div class="flex items-center gap-6 max-lg:flex-col">
                <EventFilter />
                <AppSearchInput class="grow" />
            </div>
            <section
                class="grid gap-6 md:grid-cols-3 min-h-[50vh] place-content-center"
            >
                <template v-if="props.futureEvents.data.length">
                    <template
                        v-for="event in props.futureEvents.data"
                        :key="event?.id"
                    >
                        <MyEventsCard :event="event" />
                    </template>
                </template>
                <Empty
                    class="col-span-full"
                    :message="$t('no-future-events')"
                    v-else
                />
            </section>
            <section class="space-y-6 min-h-[50vh]">
                <h2 class="auth-title">
                    {{ $t("previous-events") }}
                </h2>
                <template v-if="props.pastEvents.data.length">
                    <template
                        v-for="event in props.pastEvents.data"
                        :key="event?.id"
                    >
                        <MyEventsLongCard :event="event" />
                    </template>
                </template>
                <Empty :message="$t('no-previous-events')" v-else />
            </section>
        </div>
    </AppLayout>
</template>

<style scoped></style>
