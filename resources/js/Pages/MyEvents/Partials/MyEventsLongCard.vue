<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        event: TEvent;
        showCancelAttendButton: boolean;
    }>(),
    {
        showCancelAttendButton: false,
    }
);
const cancelAttendForm = useForm({});
const cancelAttendEvent = () => {
    cancelAttendForm.delete(route("event.un-attend", [props.event]), {
        preserveScroll: true,
    });
};
</script>
<template>
    <Link
        class="grid md:grid-cols-[15rem,1fr] gap-6 border-primary-200 border rounded-2xl p-2"
        :href="route('events.show', [event])"
    >
        <div class="h-full">
            <img
                :src="
                    event.featured_image !== ''
                        ? event.featured_image
                        : getImgPlaceholder(props.event?.name)
                "
                class="object-cover w-full max-h-56 rounded-xl"
            />
        </div>
        <div class="space-y-4">
            <div class="flex gap-2" v-if="showCancelAttendButton">
                <Badge variant="outline" :label="$t('you-are-going')" />
                <AlertDialog
                    @confirm="cancelAttendEvent"
                    title=""
                    :loading="cancelAttendForm.processing"
                    :confirmLabel="$t('cancel-attending')"
                >
                    <Button
                        icon="i-heroicons-arrow-left-end-on-rectangle"
                        :aria-label="$t('cancel')"
                        size="icon-sm"
                        @click.prevent=""
                    />
                </AlertDialog>
            </div>
            <div>
                <h3 class="text-lg font-medium text-primary-950">
                    {{ event.name }}
                </h3>
                <p
                    v-html="event.description"
                    class="text-xs line-clamp-1 text-primary-600"
                ></p>
            </div>
            <EventDateAndLocation :event="event" class="my-auto" />
            <AvatarGroup :users="event.users" />
        </div>
    </Link>
</template>
