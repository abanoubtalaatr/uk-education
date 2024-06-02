<script setup lang="ts">
const props = defineProps<{
    event: TEvent;
}>();

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
        onError: (error) => {
            pushMessageNotification("error", {
                props: {
                    title: "Error",
                    message: error,
                },
            });
        },
    });
};

const cancelAttendForm = useForm({});
const cancelAttendEvent = () => {
    cancelAttendForm.delete(route("event.un-attend", [props.event]), {
        preserveScroll: true,
    });
};
const page = usePage();
const isAuth = computed(() => !!page.props.auth.user);
</script>
<template>
    <template
        v-if="dayjs(event.start_date).isAfter(dayjs().subtract(1, 'day'))"
    >
        <Button
            :label="$t('attend')"
            @click.stop.prevent="attendEvent"
            :loading="attendForm.processing"
            v-if="!event.attending && !event.attended && isAuth"
        />
        <SurveyForm v-if="event.survey" v-model:open="showSurvey" />
        <AlertDialog
            v-if="event.attending && !event.attended"
            @confirm="cancelAttendEvent"
            title=""
            :loading="cancelAttendForm.processing"
            :confirmLabel="$t('cancel-attending')"
            :description="$t('are-you-sure-you-want-to-un-attend-event')"
        >
            <Button :label="$t('cancel')" />
        </AlertDialog>
    </template>
</template>
