<script setup lang="ts">
import { Head, useForm } from "@inertiajs/vue3";
import OnBoardingLayout from "@/Layouts/OnBoardingLayout.vue";
import Checkbox from "@/Components/Checkbox.vue";

const props = defineProps({
    step: Number,
});

const form = useForm({
    show_events_my_city: true,
    show_events_ksa: true,
    notifications_via_mail: true,
    notifications_via_sms: true,
    notifications_via_whatsapp: true,
    show_personal_information: true,
    show_event_attendance: true,
});

const eventToggle = ref(true);
const notificationToggle = ref(true);
const privacyToggle = ref(true);

watch(eventToggle, async (newValue) => {
    if (newValue === false) {
        form.show_events_ksa = false;
        form.show_events_my_city = false;
    } else if (newValue === true) {
        form.show_events_ksa = true;
        form.show_events_my_city = true;
    }
});

watch(notificationToggle, async (newValue) => {
    if (newValue === false) {
        form.notifications_via_mail = false;
        form.notifications_via_sms = false;
        form.notifications_via_whatsapp = false;
    } else if (newValue === true) {
        form.notifications_via_mail = true;
        form.notifications_via_sms = true;
        form.notifications_via_whatsapp = true;
    }
});

watch(privacyToggle, async (newValue) => {
    if (newValue === false) {
        form.show_event_attendance = false;
        form.show_personal_information = false;
    } else if (newValue === true) {
        form.show_event_attendance = true;
        form.show_personal_information = true;
    }
});

const submit = () => {
    form.post(route("settings.store"));
};
const showEventAccordingTo = ref<"ksa" | "my-city">("my-city");
watch(showEventAccordingTo, (newValue) => {
    if (newValue === "ksa") {
        form.show_events_my_city = false;
        form.show_events_ksa = true;
    } else if (newValue === "my-city") {
        form.show_events_my_city = true;
        form.show_events_ksa = false;
    }
});
</script>

<template>
    <Head title="On boarding personal information" />

    <OnBoardingLayout
        image-src="/images/settings.webp"
        :title="$t('settings')"
        :subtitle="$t('select_settings')"
        :step="step"
    >
        <Form @submit="submit" class="gap-2">
            <div class="flex flex-col gap-3 p-5 border rounded-2xl">
                <div class="flex justify-between w-full">
                    <div>
                        <div class="text-xl font-medium">
                            {{ $t("events") }}
                        </div>
                        <div class="text-sm text-gray-600">
                            {{ $t("choose-events-to-show") }}
                        </div>
                    </div>
                </div>
                <template v-if="eventToggle">
                    <hr />
                    <div class="flex flex-col gap-2">
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
                </template>
            </div>

            <div class="flex flex-col gap-3 p-5 border rounded-2xl">
                <div class="flex justify-between w-full">
                    <div>
                        <div class="text-xl font-medium">
                            {{ $t("notification") }}
                        </div>
                        <div class="text-sm text-gray-600">
                            {{ $t("select-the-mean-you-wish-to-be-notified") }}
                        </div>
                    </div>
                    <div>
                        <Switch v-model:checked="notificationToggle" />
                    </div>
                </div>
                <template v-if="notificationToggle">
                    <hr />
                    <div class="flex flex-col gap-2">
                        <Checkbox
                            id="notifications_via_mail"
                            v-model="form.notifications_via_mail"
                            name="notifications_via_mail"
                            class="text-sm"
                        >
                            <div>{{ $t("email") }}</div>
                        </Checkbox>
                        <Checkbox
                            id="notifications_via_sms"
                            v-model="form.notifications_via_sms"
                            name="notifications_via_sms"
                            class="text-sm"
                        >
                            <div>{{ $t("sms") }}</div>
                        </Checkbox>
                        <Checkbox
                            id="notifications_via_whatsapp"
                            v-model="form.notifications_via_whatsapp"
                            name="notifications_via_whatsapp"
                            class="text-sm"
                        >
                            <div>{{ $t("whatsapp") }}</div>
                        </Checkbox>
                    </div>
                </template>
            </div>

            <div class="flex flex-col gap-3 p-5 border rounded-2xl">
                <div class="flex justify-between w-full">
                    <div>
                        <div class="text-xl font-medium">
                            {{ $t("privacy-settings") }}
                        </div>
                        <div class="text-sm text-gray-600">
                            {{ $t("brief-description-about-privacy-settings") }}
                        </div>
                    </div>
                    <div>
                        <Switch v-model:checked="privacyToggle" />
                    </div>
                </div>
                <template v-if="privacyToggle">
                    <hr />
                    <div class="flex flex-col gap-2">
                        <Checkbox
                            id="show_personal_information"
                            v-model="form.show_personal_information"
                            name="show_personal_information"
                            class="text-sm"
                        >
                            <div>{{ $t("show-personal-information") }}</div>
                        </Checkbox>
                        <Checkbox
                            id="show_event_attendance"
                            v-model="form.show_event_attendance"
                            name="show_event_attendance"
                            class="text-sm"
                        >
                            <div>{{ $t("show-attendance-on-events") }}</div>
                        </Checkbox>
                    </div>
                </template>
            </div>

            <Button
                type="submit"
                :loading="form.processing"
                :label="$t('next')"
            />

            <button type="submit" class="underline">
                {{ $t("skip") }}
            </button>
        </Form>
    </OnBoardingLayout>
</template>
