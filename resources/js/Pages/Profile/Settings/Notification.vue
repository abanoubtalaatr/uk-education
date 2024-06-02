<script setup lang="ts">
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    user: {
        required: true,
        type: Object,
    },
});

const form = useForm({
    show_events_my_city: Boolean(props.user.data.show_events_my_city),
    show_events_ksa: Boolean(props.user.data.show_events_ksa),
    notifications_via_mail: Boolean(props.user.data.notifications_via_mail),
    notifications_via_sms: Boolean(props.user.data.notifications_via_sms),
    notifications_via_whatsapp: Boolean(
        props.user.data.notifications_via_whatsapp
    ),
});

const eventToggle = ref(form.show_events_my_city || form.show_events_ksa);
const notificationToggle = ref(
    form.notifications_via_mail ||
        form.notifications_via_sms ||
        form.notifications_via_whatsapp
);

watch(eventToggle, async (newValue) => {
    if (newValue === false) {
        form.show_events_ksa = false;
        form.show_events_my_city = false;
    }
    if (newValue === true) {
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

const submit = () => {
    form.put(route("settings.notifications.update"));
};
</script>

<template>
    <ProfileLayout :header="$t('notification-settings')">
        <Head :title="$t('notification-settings')" />

        <Form @submit="submit" class="gap-2">
            <div class="flex flex-col gap-3 p-5 border rounded-2xl">
                <div class="flex justify-between w-full">
                    <div>
                        <div class="text-xl font-medium">
                            {{ $t("notification") }}
                        </div>
                        <div class="text-sm text-gray-600">
                            {{ $t("notification-criteria") }}
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
                            <div>Email</div>
                        </Checkbox>
                        <Checkbox
                            id="notifications_via_sms"
                            v-model="form.notifications_via_sms"
                            name="notifications_via_sms"
                            class="text-sm"
                        >
                            <div>SMS</div>
                        </Checkbox>
                        <Checkbox
                            id="notifications_via_whatsapp"
                            v-model="form.notifications_via_whatsapp"
                            name="notifications_via_whatsapp"
                            class="text-sm"
                        >
                            <div>Whatsapp</div>
                        </Checkbox>
                    </div>
                </template>
            </div>

            <div class="flex justify-end mt-5">
                <Button
                    type="submit"
                    :loading="form.processing"
                    :label="$t('save')"
                />
            </div>
        </Form>
    </ProfileLayout>
</template>

<style scoped></style>
