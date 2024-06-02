<script setup lang="ts">
import SurveyForm from "@/Components/Survey/SurveyForm.vue";
const props = defineProps<{
    event: Resource<TEvent>;
}>();

const remainingSeats = computed (() => props.event.data.number_of_seats ? props.event.data.number_of_seats - props.event.data.number_of_attendees: 0) ;
</script>
<template>
    <AppLayout>
        <!-- event card  -->
        <div class="container page-wrapper">
            <EventLongCard :event="event" />
            <div class="grid gap-6 lg:grid-cols-[1fr,20rem]">
                <div class="space-y-8 max-lg:order-2">
                    <slot />
                </div>
                <div class="space-y-6 max-lg:order-1">
                    <div
                        class="flex flex-col gap-3 p-4 border border-primary-200 rounded-2xl"
                    >
                        <Badge
                            :label="
                                $t('count-places-left', {
                                    count: remainingSeats,
                                })
                            "
                            variant="secondary"
                            class="self-start"
                        />

                        <span
                            class="text-lg font-medium uppercase text-primary-600"
                            >{{ formatDate(props.event.data.start_date) }}</span
                        >
                        <EventOptions :event="event.data" />
                    </div>
                    <div class="space-y-2">
                        <h3 class="text-2xl font-bold text-primary">
                            {{ $t("share-event") }}
                        </h3>
                        <AppShareButtons
                            :url="route('events.show', [event.data])"
                            :text="`Lets't attend this event ${
                                event.data.name
                            } in ${formatDate(event.data.start_date)}`"
                        />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
