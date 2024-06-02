<script setup lang="ts">
const page = usePage();
const user = computed(() => page.props.auth.user);
const form = useForm({
    show_events_my_city: Boolean(user.value.show_events_my_city),
    show_events_ksa: Boolean(user.value.show_events_ksa),
    notifications_via_mail: Boolean(user.value.notifications_via_mail),
    notifications_via_sms: Boolean(user.value.notifications_via_sms),
    notifications_via_whatsapp: Boolean(user.value.notifications_via_whatsapp),
});
const eventToggle = ref(form.show_events_my_city || form.show_events_ksa);
watch(eventToggle, async (newValue) => {
    if (newValue === false) {
        form.show_events_ksa = false;
        form.show_events_my_city = false;
    }
    if (newValue === true) {
        form.show_events_ksa = true;
        form.show_events_my_city = true;
    }
    submit();
});
const submit = () => {
    form.put(route("settings.notifications.update"), {
        preserveScroll: true,
        preserveState: true,
    });
};

const showEventAccordingTo = ref<"ksa" | "my-city">(
    user.value.show_events_my_city ? "my-city" : "ksa"
);
watch(showEventAccordingTo, (newValue) => {
    if (newValue === "ksa") {
        form.show_events_my_city = false;
        form.show_events_ksa = true;
    } else if (newValue === "my-city") {
        form.show_events_my_city = true;
        form.show_events_ksa = false;
    }
    submit();
});
</script>
<template>
    <Card>
        <CardHeader>
            <div>
                <h2 class="card-title">
                    {{ $t("events") }}
                </h2>
                <p class="card-description">
                    {{ $t("choose-preference") }}
                </p>
            </div>
        </CardHeader>
        <CardContent v-if="eventToggle">
            <div class="flex flex-col gap-3">
                <RadioGroup v-model="showEventAccordingTo">
                    <RadioGroupItem
                        :value="'my-city'"
                        :label="$t('show-events-my-city')"
                    />
                    <RadioGroupItem
                        :value="'ksa'"
                        :label="$t('show-events-ksa')"
                    />
                </RadioGroup>
            </div>
        </CardContent>
    </Card>
</template>
