<script setup lang="ts">
const props = defineProps<{
    event: TEvent;
}>();
const attending = computed(() => props.event?.attending);
const attendForm = useForm({});
const showSurvey = ref(false);
const attendEvent = () => {
    attendForm.post(route("event.attend", [props.event]), {
        preserveScroll: true,
        preserveState: true,
        onSuccess: () => {
            if (props.event.survey) {
                showSurvey.value = true;
            }
        },
    });
};

const cancelAttendForm = useForm({});
const cancelAttendEvent = () => {
    cancelAttendForm.delete(route("event.un-attend", [props.event]), {
        preserveScroll: true,
    });
};
</script>
<template>
    <Link
        :href="route('events.show', [event])"
        class="relative border rounded-2xl border-primary-200"
    >
        <div class="h-72 rounded-2xl">
            <img
                :src="
                    event.featured_image !== ''
                        ? event.featured_image
                        : getImgPlaceholder(event?.name)
                "
                class="object-cover w-full h-full rounded-t-2xl"
                :alt="event.name"
            />
            <Link
                :href="route('events.show', [event])"
                class="absolute top-0 flex items-center justify-center p-1 m-1 border border-white rounded-lg bg-white/70 end-0"
            >
                <span
                    class="i-radix-icons-arrow-top-right text-primary size-7"
                />
            </Link>
        </div>
        <div class="p-4 space-y-2">
            <div
                class="flex items-center justify-between text-2xl font-medium font-alegreya-sans-sc"
            >
                <h2 class="title-2xl">
                    {{ event.name }}
                </h2>
                <Badge
                    :label="$t('attending')"
                    variant="secondary"
                    v-if="event.attended"
                    class="self-start"
                />
            </div>
            <p
                v-html="event.description"
                class="text-xs text-primary-600 line-clamp-1"
            />
            <EventDateAndLocation :event="event" />
            <div class="grid">
                <EventOptions :event="event" class="" />
            </div>
        </div>
    </Link>
</template>
